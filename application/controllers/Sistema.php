<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sistema extends MY_Controller
{

    public function index()
    {
        $this->titulo     = 'Bienvenido '.$this->usuario['nombre'];
        
        //$this->js[]='dashboard.js';
        //$this->data['can_productos']=$this->productos_model->obtener_cantidad($this->usuario['id_usuario']);
        //$this->data['can_fisi']=$this->clientefisico_model->obtener_cantidad($this->usuario['id_usuario']);
        //$this->data['can_juri']=$this->clientejuridico_model->obtener_cantidad($this->usuario['id_usuario']);
        //$this->data['can_transac']=$this->transacciones_model->obtener_cantidad($this->usuario['id_usuario']);

        $data['resultado'] = $this->Administracion_model->get_gestor($this->usuario['usuario']);
       $data['conteos']=$this->Administracion_model->get_conunt_gestion($this->usuario['usuario']);

       // print_r($data['conteos']=$this->Administracion_model->get_conunt_gestion($this->usuario['usuario']));
        $this->vista = 'sistema/inicio';
        $this->load->view('plantilla/plantilla',$data);
    }

    public function noacceso()
    {
        $this->titulo     = 'Error';
        $this->sub_titulo = 'Acceso Denegado';
        //$this->js[]='dashboard.js';
        $this->vista = 'errores/noacceso';
        $this->load->view('plantilla/plantilla');
    }

}
