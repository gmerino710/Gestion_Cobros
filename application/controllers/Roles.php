<?php

use FontLib\Table\Type\post;

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public function index ()
    {
        $data['roles'] = $this->Model_general->get_roles();
        $data['menu']  = $this->Model_general->get_menu();
        $this->sub_titulo = 'Información de la cuenta';
        $this->titulo     = 'Creacion de roles';
        $this->vista = 'formu/Roles_view';
        $this->load->view('plantilla/plantilla',$data);
 
    }

    public function permissions($id=null)
    {
        if ($id!=null) {
        $data['rol_name'] =$this->Model_general->get_rol($id) ;   
        $data['roles'] = $this->Model_general->get_roles($id);
        $data['menu']  = $this->Model_general->get_menu();
        $this->sub_titulo = 'Información de la cuenta';
        $this->titulo     = 'Asignacion de permisos';
        $this->vista = 'formu/Permisos_view';
        $this->load->view('plantilla/plantilla',$data);

    }

    else {
        redirect('Roles');
    }
}


public function Set_permissions ()
{
    $values = $this->input->post('save');

    if (isset($values)) {
        $checkbox = $this->input->post('id_menu[]');
        for($i=0;$i<count($checkbox);$i++){
            $category_id = intval($checkbox[$i]);
            
            $this->Model_general->insert_rol_menu($values,$category_id);
        }
        echo 'se guardo';
    }
  
}

    public function Register()
    {
        $usuario = $this->input->post('nombre_rol');
        $descrip = $this->input->post('descripcion'); 

        $this->form_validation->set_rules($usuario,'user','required');
        $this->form_validation->set_rules($descrip,'name','required');
      
            if ($this->form_validation->run()==false) {
           

                $data = array(
                    'nombre_rol' =>$usuario,
                    'descripcion' =>$descrip,
                );
              $this->Model_general->insert_rol($data);

              echo 'entro';

            }else{
                $memo = array( 
                    'name_error'=> form_error($usuario),
                    'email_error'=> form_error($descrip));
                    echo json_encode($memo);
                   
            }

          # code...
        }    
      
   
       /*
        $usuario = $this->input->post('usuario');
        $nombre = $this->input->post('nombre'); 
        $this->form_validation->set_rules('usuario','user','required');
        $this->form_validation->set_rules('nombre','name','required');
      
            if ($this->form_validation->run()) {
               $encriptado = encriptar($usuario);
    
                $des = desencriptar($encriptado);

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
          
           */
         
    }

 

