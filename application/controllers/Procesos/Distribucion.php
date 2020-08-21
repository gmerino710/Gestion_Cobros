<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Distribucion extends MY_Controller
{
    public $table = 'catag_estados';

    public $codigo_table = 'Cod_estado';

        public function index()
        {
            $this->titulo = 'Distribucion de carteras';
            $this->vista = 'process/Distribucion_view';
           // $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_empresa','catag_empresa.Estado');
           $data['estados']= $this->Administracion_model->get_carteras();
            $this->load->view('plantilla/plantilla',$data);
         
        }

/*
        public function api()
        {
            $carteras= $this->Administracion_model->get_carteras_js();

            $data = json_encode($carteras);

            print($data);
        }*/
}
