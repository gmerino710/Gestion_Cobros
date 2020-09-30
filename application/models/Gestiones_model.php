<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestiones_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtiene_cliente($codigo_cartera, $codigo_cliente)
    {
        return $this->db->get_where('catag_cliente',
            array(
                'Cartera'     => $codigo_cartera,
                'Cod_cliente' => $codigo_cliente,
            )
        )->row_array();
    }

    public function obtener_acciones()
    {
        return $this->db->order_by('Accion', 'ASC')->get('catag_acciones')->result_array();
    }

    public function obtener_estatus()
    {
        return $this->db->order_by('Actividad', 'ASC')->get('catag_actividades')->result_array();
    }

    public function obtener_sub_estatus($id_estatus)
    {
        return $this->db->order_by('Subactividad', 'ASC')->get_where('catag_sub_actividades', array('Actividad' => $id_estatus, 'Estado' => 1))->result_array();
    }
    public function ingresar_gestion($usuario_add, $codigo_cliente, $codigo_cartera, $fecha, $cod_accion, $observaciones, $cod_act, $cod_sub)
    {
        $this->db->insert('gestiones_x_cliente',
            array(
                'cod_cliente'   => $codigo_cliente,
                'cartera'       => $codigo_cartera,
                'fecha'         => $fecha,
                'fecha_hora'    => $fecha,
                'cod_accion'    => $cod_accion,
                'observaciones' => $observaciones,
                'cod_act'       => $cod_act,
                'cod_sub'       => $cod_sub,
                'usuario_add'   => $usuario_add,
            )
        );
    }

    public function obtener_historial($fecha_inicio, $fecha_fin, $codigo_cliente, $cartera)
    {
        $this->db->select('a.*,b.Accion, c.Actividad, d.Subactividad');
        $this->db->where("a.cod_accion = b.Cod_accion and a.cod_act = c.Cod_act and a.cod_sub = d.Cod_sub");
        return $this->db->order_by('fecha', 'ASC')
            ->limit(500)
            ->get_where('gestiones_x_cliente a, catag_acciones b, catag_actividades c, catag_sub_actividades d',
                array(
                    'a.fecha>='     => $fecha_inicio,
                    'a.fecha<='     => $fecha_fin,
                    'a.cartera'     => $cartera,
                    'a.cod_cliente' => $codigo_cliente,
                )
            )->result_array();
    }

}
