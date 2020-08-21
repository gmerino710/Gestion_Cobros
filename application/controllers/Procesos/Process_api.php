<?php


defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Process_api extends REST_Controller
{

    public function __construct() {
        parent::__construct();
    
     }

    public function index_get()
    {
        $carteras= $this->Administracion_model->get_carteras_js();

        $this->response($carteras, REST_Controller::HTTP_OK);
    }

    
}