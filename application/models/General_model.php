<?php
defined('BASEPATH') or exit('No direct script access allowed');

class general_model extends CI_Model
{

    public $tabla        = '';
    public $id_tabla     = '';
    public $campo_buscar = '';
    public $campos       = array();

    public function obtener($buscar = '')
    {
        return $this->db->like($this->campo_buscar, $buscar)->limit(500)->get($this->tabla)->result_array();
    }

    public function agregar_campo($nombre_campo, $nombre_mostrar, $mostrar_lista, $tipo = 'text', $dato_relacion = array(), $validacion = '')
    {
        $this->general_model->campos[] = array(
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
        $this->db->insert($this->tabla, $datos);
    }
    public function obtener_uno($id)
    {
        return $this->db->get_where($this->tabla, array($this->id_tabla => $id)
        )->row_array();
    }
    public function actualizar($datos, $id)
    {
        $this->db->update($this->tabla, $datos, array($this->id_tabla => $id));
    }

    public function obtiene_descripcion($tabla, $id_tabla, $id, $descripcion)
    {
        $dato = $this->db->select($descripcion)->where(array($id_tabla => $id))->get($tabla)->row_array();
        if ($dato) {
            return $dato[$descripcion];
        } else {
            return '';
        }
    }

}
