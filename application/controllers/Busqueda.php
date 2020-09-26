<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Busqueda extends MY_Controller
{
    public function index()
    {
       // echo base_url('api/criterios');

        $this->titulo = 'Busqueda';
        $this->vista = 'gestion_cobros/busqueda_view';
       

       $data['estados'] = $this->Administracion_model->get_field('catag_criterios_busqueda');

        $this->load->view('plantilla/plantilla',$data);
    }

}