<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
        public function index ($id = null )
        {
          
            $data['users'] = $this->Model_general->Get_usuarios();
            $this->titulo     = 'Usuarios';
            $this->vista = 'formu/Perfiles/Usuario_view';
            $this->load->view('plantilla/plantilla',$data);
        }

        public function Set_users ()
        {
            $data['roles']= $this->Model_general->get_rol();

            $data['estados']= $this->Model_general->Get_estado_usuario();

            $this->titulo     = 'Nuevo usuario';
            $this->vista = 'formu/Perfiles/Nuevo_registro_view';
            $this->load->view('plantilla/plantilla',$data);
        }
        
        public function Register()
        {
          $usuario = $this->input->post("usuario");
          $contraseña=  $this->input->post("clave");
          $confirmacion=  $this->input->post("conf");
          $Cargo= $this->input->post("nombre");
          $rol= $this->input->post("rol");
          $estado= $this->input->post("estados");

          //------------------------------------------------------
          //clave
          $this->form_validation->set_rules('clave','Usuario','required');
          //contras
          $this->form_validation->set_rules('clave','Contraseña','required');
          // valida sin son iguales
          $this->form_validation->set_rules('conf',' Contraseña ','math[clave]',array(
            'math' =>'Contraseña no coinciden'

          ));

          if ($this->form_validation->run()==True) {
            $data = array(
              'usuario'=>$usuario,
              'clave' =>encriptar( $contraseña),
              'nombre'=>$Cargo,
              'id_rol'=>$rol,
              'id_estado_usuario' =>$estado,
              'permiso_login'=>'web'
            );
  
            $this->Model_general->Insert_user($data);
            $this->session->set_flashdata('item','Usuario Registrado');
            redirect('/usuarios');
          } else {
            $data['roles']= $this->Model_general->get_rol();

            $data['estados']= $this->Model_general->Get_estado_usuario();

            $this->titulo     = 'Nuevo usuario';
            $this->vista = 'formu/Perfiles/Nuevo_registro_view';
            $this->load->view('plantilla/plantilla',$data);
          }
          

        
        }

       


        public function delete($id=null)
        {
          if ($id==null) {
              redirect('Usuarios');
          } else {
            $this->Model_general->destroy_rol($id);
            
            redirect('Usuarios');
          }
          
        
          
            
        }   


        public function edit_user($id=null)
        {
              if ($id==null) {
                redirect('Usuarios');
            } else {
            $this->titulo  = 'Actualizar usuario';
            $data['roles']= $this->Model_general->get_rol();

            $data['estados']= $this->Model_general->Get_estado_usuario();
            $data['old'] =$this->Model_general->Get_user_id($id);
            $this->vista = 'formu/Perfiles/Update_registro_view';
            $this->load->view('plantilla/plantilla',$data);
           
          } 
          
        }

        public function update()
        {
          $id = $this->input->post("id");
          $usuario = $this->input->post("usuario");
          $contraseña=  $this->input->post("clave");
          $Cargo= $this->input->post("nombre");
          $rol= $this->input->post("rol");
          $estado= $this->input->post("estados");
          //$id = $this->uri->segment(3);

          $data = array(
            'usuario'=>$usuario,
            'clave' =>encriptar( $contraseña),
            'nombre'=>$Cargo,
            'id_rol'=>$rol,
            'id_estado_usuario' =>$estado
          );
       
           $this->session->set_flashdata('item','Usuario Actualizado');
          
            $this->Model_general->Update_user($data,$id);

          redirect('Usuarios');
    
          /*

          $data = array(
            'usuario'=>$usuario,
            'clave' =>encriptar( $contraseña),
            'nombre'=>$Cargo,
            'id_rol'=>$rol,
            'id_estado_usuario' =>$estado,
            'permiso_login'=>'web'
          );

          $this->Model_general->Insert_user($data,$id);
          redirect('/usuarios');
          */
        }

    }
