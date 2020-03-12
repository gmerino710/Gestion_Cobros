<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{
   public function index ()
   {
    $this->titulo     = 'Menus';
    $data['menu'] =$this->Parametros_model->obtener_menu();
    $this->vista = 'Menu//Menu_view';
    $this->load->view('plantilla/plantilla',$data);
   }

}
