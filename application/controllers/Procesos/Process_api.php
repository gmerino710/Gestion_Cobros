<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Process_api extends REST_Controller
{

    public function __construct() {
        parent::__construct();
    
     }

    public function index_get($criterio,$id=null)
    { 
        /*
        echo $criterio;
        echo '<br>';
        echo $id;*/

        if (empty($id)) {
            $this->response(array('status' => 'Porfavor ingrese un valor para la busqueda '));

        } else{
            $carteras= $this->Administracion_model->get_client($criterio,$id);

            if ($carteras == null) {
    
                //$respuesta  = "{'error':'sin data'}";
                
                $this->response(array('status' => 'Cliente no encontrado'));
            }
            else{
    
                $this->response($carteras, REST_Controller::HTTP_OK);
    
            }
        }
            
        
        
        /*
        if (empty($id)) {
            $this->response(array('status' => 'Porfavor ingresa un valor '));

        } 
        
        else {
            $carteras= $this->Administracion_model->get_client($criterio,$id);

            if ($carteras == null) {
    
                //$respuesta  = "{'error':'sin data'}";
                
                $this->response(array('status' => 'Cliente no encontrado'));
            }
            else{
    
                $this->response($carteras, REST_Controller::HTTP_OK);
    
            }
        }*/
        
        
    }
/*
    public function index_get()ww
    {
        $table = "catag_criterios_busqueda";
        $clientes= $this->Administracion_model->get_datas($table);
     
        echo json_encode($clientes);
    }*/
}