<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Carteras extends MY_Controller
{

        public function index()
        {

            $this->titulo     = 'Administración de Carteras';
            $this->vista = 'admin/Carteras_view';
            $this->load->view('plantilla/plantilla');

        }


        
}