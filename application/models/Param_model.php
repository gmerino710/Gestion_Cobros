<?php
defined('BASEPATH') or exit('No direct script access allowed');

class param_model extends CI_Model
{

    public function obtener_por_id($id)
    {
        $dato = $this->db->get_where('catag_parametros', array('id' => $id))->row_array();
        if ($dato) {
            return $dato['valor'];
        } else {
            return '';
        }

    }
    public function actualiza_proceso_ofac($estado = true)
    {
        if ($estado) {
            $this->db->update('catag_parametros', array('valor' => 'SI'), array('id' => 7));
            $this->db->update('catag_parametros', array('valor' => date('d/m/Y')), array('id' => 11));
        } else {
            $this->db->update('catag_parametros', array('valor' => 'NO'), array('id' => 7));
        }

    }
    public function actualiza_proceso_onu($estado = true)
    {
        if ($estado) {
            $this->db->update('catag_parametros', array('valor' => 'SI'), array('id' => 10));
            $this->db->update('catag_parametros', array('valor' => date('d/m/Y')), array('id' => 12));
        } else {
            $this->db->update('catag_parametros', array('valor' => 'NO'), array('id' => 10));
        }

    }

    public function obtiene_iconos($nombre)
    {
        return $this->db->select('nombre_icono id, nombre_icono name, nombre_icono full_name, id_icono,nombre_icono')->like('nombre_icono', $nombre)->get('catag_iconos')->result_array();
    }

    public function obtiene_colores($nombre)
    {
        return $this->db->select('nombre_color id, nombre_color name, nombre_color full_name, id_color,nombre_color')->like('nombre_color', $nombre)->get('catag_colores')->result_array();
    }

    public function obtiene_contador($id)
    {
        $dato = $this->db->get_where('catag_contadores', array('id_contador' => $id))->row_array();
        return $dato;
    }

    public function obtener_contadores()
    {
        return $this->db->get('catag_contadores')->result_array();
    }

    public function obtener_contadores_x_perfil($id_usuario = 0, $id_perfil = 0)
    {
        return $this->db->get_where('contadores_x_perfiles', array(
            'id_usuario' => $id_usuario,
            'id_perfil'  => $id_perfil,
        ))->result_array();
    }

    public function actualizar_contadores_perfiles($contadores, $id_perfil = 0)
    {
        $this->db->delete('contadores_x_perfiles', array('id_perfil' => $id_perfil,
            'id_usuario'                                                 => $this->usuario['id_usuario'],
        )
        );
        foreach ($contadores as $key => $value) {
            $this->db->insert('contadores_x_perfiles', array('id_contador' => $value, 'id_perfil' => $id_perfil, 'id_usuario' => $this->usuario['id_usuario']));
        }
    }

}
