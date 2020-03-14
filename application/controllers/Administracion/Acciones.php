<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Acciones extends MY_Controller
{

        public function index()
        {

            $this->titulo = 'Administración de Acciones';
            $this->vista = 'admin/Acciones_view';
            $this->load->view('plantilla/plantilla');

        }


        
    }
