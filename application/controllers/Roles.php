<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public function index ()
    {

        $this->sub_titulo = 'Información de la cuenta';
        $this->titulo     = 'Mi perfil';
        $this->vista = 'formu/formu';
        $this->load->view('plantilla/plantilla');
 
    }
    public function Register()
    {
       
        $usuario = $this->input->post('usuario');
        $nombre = $this->input->post('nombre'); 
        $this->form_validation->set_rules('usuario','user','required');
        $this->form_validation->set_rules('nombre','name','required');
      
            if ($this->form_validation->run()) {
              /*  $encriptado = encriptar($usuario);
    
                $des = desencriptar($encriptado);*/

              $data = array(
                  'usuario' =>$usuario,
                  'nombre' => encriptar($nombre),
              );

                $this->usuario_model->comun($data);

            }else{
                $memo = array( 
                    'error'=> true,
                    'name_error'=> form_error('usuario'),
                    'email_error'=> form_error('nombre'));
                    echo json_encode($memo);
                   
            }
            redirect('Roles');
          
           
     
    }

}