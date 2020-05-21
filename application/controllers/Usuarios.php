<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends MY_Controller
{
  public $table = 'catag_usuarios' ;

  public $codigo_table ='id_usuario';

  public $rules =array(
    array(
      'field' => 'usuario',
      'label' => 'Usuario',
      'rules' => 'required|regex_match[/^([a-zA-Z]|\s)+$/]|max_length[10]|min_length[4]|is_unique[catag_usuarios.usuario]'
  ),
  array(
      'field' => 'clave',
      'label' => 'Clave',
      'rules' => 'required|max_length[40]|min_length[3]',
  ),
  array(
      'field' => 'nombre',
      'label' => 'Nombre',
      'rules' => 'required|regex_match[/^[][a-zA-Z-@# ,().]+$/]|max_length[40]|min_length[3]'
  ),
  array(
      'field' => 'conf',
      'label' => 'Confirmacion',
      'rules' => 'required|matches[clave]'
  )
);

/*  |required|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
        ));   */

  public $rules2 =array(
    array(
      'field' => 'usuario',
      'label' => 'Usuario',
      'rules' => 'regex_match[/^([a-zA-Z]|\s)+$/]|max_length[40]|min_length[3]'
  ),
  array(
      'field' => 'clave',
      'label' => 'Clave',
      'rules' => 'max_length[40]|min_length[3]',
  ),
  array(
      'field' => 'nombre',
      'label' => 'Nombre',
      'rules' => 'regex_match[/^[][a-zA-Z-@# ,().]+$/]|max_length[40]|min_length[3]'
  ),
 /* array(
      'field' => 'conf',
      'label' => 'Confirmacion',
      'rules' => 'matches[clave]'
  )
*/

  );
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
 
        
          $this->form_validation->set_rules($this->rules);
          $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

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

          $row =$this->Administracion_model->get_estad($id);

          foreach ($row as $s) {

            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null or $s['id_estado_usuario'] ==1 ){
              $this->session->set_flashdata('err','No se puede eliminar'); 
              redirect('Usuarios');
                  
              } else {
                $this->Model_general->destroy_rol($id);
                $this->session->set_flashdata('item','Usuario Eliminado');
                redirect('Usuarios');
              }
               
          }
          
            
        }   


        public function edit_user($id=null )
        {
              if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
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
         
        $usuario = $this->input->post("usuario");
  

        if ($usuario==null) {
          $id = $this->input->post("id");
          $contraseña=  $this->input->post("clave");
          $Cargo= $this->input->post("nombre");
          $rol= $this->input->post("rol");
          $estado= $this->input->post("estados");
          

            //$id = $this->ri->segment(3);
            $this->form_validation->set_rules($this->rules2);
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            if ($this->form_validation->run()==True) {
                if ($contraseña == null) {
                  $data = array(

                    'nombre'=>$Cargo,
                    'id_rol'=>$rol,
                    'id_estado_usuario' =>$estado
                  );
                  $this->session->set_flashdata('item','Usuario Actualizado');
                
                  $this->Model_general->Update_user($data,$id);
                  redirect('Usuarios');


                }
                
                else{
                  $data = array(
              
                    'clave' =>encriptar( $contraseña),
                    'nombre'=>$Cargo,
                    'id_rol'=>$rol,
                    'id_estado_usuario' =>$estado
                  );
                  $this->session->set_flashdata('item','Usuario Actualizado');
                
                  $this->Model_general->Update_user($data,$id);
      
                redirect('Usuarios');

                }
           
            } else {
              $this->titulo  = 'Actualizar usuario';
              $data['roles']= $this->Model_general->get_rol();
  
              $data['estados']= $this->Model_general->Get_estado_usuario();
              $data['old'] =$this->Model_general->Get_user_id($id);
              $this->vista = 'formu/Perfiles/Update_registro_view';
              $this->load->view('plantilla/plantilla',$data);
            }
         
        }else{
          redirect('Usuarios');

        }

        
          

     
       
         
    
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
