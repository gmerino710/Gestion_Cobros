<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mante_usuario_model extends CI_Model
{

    public $tabla            = '';
    public $id_tabla         = '';
    public $campo_buscar     = '';
    public $campos           = array();
    public $id_usuario       = 0;
    public $id_unico_usuario = "";

    public function obtener($buscar = '')
    {
        return $this->db->where(array('id_usuario' => $this->id_usuario))
            ->like($this->campo_buscar, $buscar)->limit(500)->get($this->tabla)->result_array();
    }

    public function agregar_campo($nombre_campo, $nombre_mostrar, $mostrar_lista, $tipo = 'text', $dato_relacion = array(), $validacion = '')
    {
        $this->campos[] = array(
            'nombre'   => $nombre_campo,
            'mostrar'  => $nombre_mostrar,
            'lista'    => $mostrar_lista,
            'tipo'     => $tipo,
            'relacion' => $dato_relacion,
            'regla'    => $validacion,
        );
    }
    public function guardar($datos)
    {
        $datos['id_usuario'] = $this->id_usuario;
        $this->db->insert($this->tabla, $datos);
    }
    public function obtener_uno($id)
    {
        return $this->db->get_where($this->tabla, array($this->id_tabla => $id, 'id_usuario' => $this->id_usuario)
        )->row_array();
    }
    public function actualizar($datos, $id)
    {
        $this->db->update($this->tabla, $datos, array($this->id_tabla => $id, 'id_usuario' => $this->id_usuario));
    }
    public function eliminar($id)
    {
        $this->db->delete($this->tabla, array($this->id_tabla => $id, 'id_usuario' => $this->id_usuario));
    }
    public function obtiene_descripcion($tabla, $id_tabla, $id, $descripcion)
    {
        $dato = $this->db->select($descripcion)->where(array($id_tabla => $id,
            'id_usuario'                                                   => $this->id_usuario,
        )
        )->get($tabla)->row_array();
        if ($dato) {
            return $dato[$descripcion];
        } else {
            return '';
        }
    }

    public function existe($id)
    {
        $dato = $this->db->get_where($this->tabla, array(
            $this->id_unico_usuario => $id,
            'id_usuario'            => $this->id_usuario)
        )->row_array();
        if ($dato) {
            return true;
        } else {
            return false;
        }
    }

    public function insertar_empleados($datos)
    {
        $this->db->insert_batch('empleados', $datos);
    }

    public function insertar_muchos($datos)
    {
        $this->db->insert_batch($this->tabla, $datos);
    }

    public function eliminar_todo()
    {
        $this->db->delete($this->tabla, array(
            'id_usuario' => $this->id_usuario,
        ));
    }

}
