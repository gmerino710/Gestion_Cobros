<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Busqueda extends MY_Controller
{
    public function index()
    {
       // echo base_url('api/criterios');

        $this->titulo = 'Busqueda';
        $this->vista = 'gestion_cobros/busqueda_view';
        $mema = '2686 54';
        echo rawurlencode($mema);
        $ulr_codificada =rawurlencode($mema);
        echo '<br>';
        echo 'www.memo.com/criterio/';
        echo '<br>';
        echo 'www.memo.com/criterio/'.$mema;

        echo '<br>';
        echo 'url codificada';
        echo '<br>';
        echo 'www.memo.com/criterio/'.$ulr_codificada;

        echo '<br>';
        echo 'url decodificada';
        echo '<br>';
        echo 'www.memo.com/criterio/'.rawurldecode($ulr_codificada);

        $data['estados'] = $this->Administracion_model->get_datas("catag_criterios_busqueda");
        $this->load->view('plantilla/plantilla',$data);
    }

}