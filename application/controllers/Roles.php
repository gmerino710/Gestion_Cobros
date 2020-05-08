<?php

use FontLib\Table\Type\post;

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public $table = 'catag_menu_rol' ;

    public $codigo_table ='id_rol';

    public $table2 = 'catag_roles' ;


    public function __construct()
    {
        parent::__construct();
        $this->titulo                      = 'Roles';
        $this->general_model->tabla        = 'catag_roles';
        $this->general_model->id_tabla     = 'id_rol';
        $this->general_model->campo_buscar = 'nombre_rol';

      

    }


    public function index ()
    {
        $data['roles'] = $this->Model_general->get_roles();
        $data['menu']  = $this->Model_general->get_menu();
        $this->sub_titulo = 'Información de la cuenta';
        $this->titulo     = 'Creacion de roles';
        $this->vista = 'formu/Roles_view';
        $this->load->view('plantilla/plantilla',$data);
 
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
        $this->session->set_flashdata('item','Permiso asignados');

        Redirect('Roles');
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


              Redirect('Roles');

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


          public function permissions($id)
          {
              if ($id ==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table2,$this->codigo_table,$id)==null ) {
      
                  redirect('Roles');
              }
              else {
                 
              $this->data['dato'] = $this->general_model->obtener_uno(intval($id));
              if (!$this->data['dato']) {
                  /*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
                  'mensaje'=>'El registro no existe'));*/
                  redirect('roles');
              }
      
              if ($this->input->post('guardar')) {
                  $post = $this->input->post();
                  $this->usuario_model->actualizar_permisos($post['id_menu'], $id);
                    $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('roles');
              }
              $this->sub_titulo    = 'Permisos';
              $this->vista         = 'formu/Permisos_view';
              $this->data['menus'] = $this->usuario_model->obtiene_todo_menu();
              $permisos_menu       = $this->usuario_model->obtener_menus_x_rol($id);
              foreach ($this->data['menus'] as $key => $value) {
                  $this->data['menus'][$key]['tiene'] = false;
                  foreach ($permisos_menu as $key_2 => $value_2) {
                      if ($value['id_menu'] == $value_2['id_menu']) {
                          $this->data['menus'][$key]['tiene'] = true;
                          break;
                      }
                  }
      
                  foreach ($value['hijos'] as $key_2 => $value_2) {
                      $this->data['menus'][$key]['hijos'][$key_2]['tiene'] = false;
                      foreach ($permisos_menu as $key_3 => $value_3) {
                          if ($value_2['id_menu'] == $value_3['id_menu']) {
                              $this->data['menus'][$key]['hijos'][$key_2]['tiene'] = true;
                              break;
                          }
                      }
                  }
              }
              $this->session->set_flashdata('item','Datos Actualizados');
              $this->load->view($this->plantilla);
          }
      
        
      }


      public function destroy($id=null)
      {
          if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table2,$this->codigo_table,$id)==null ) {
              redirect('roles');

          } 
          if ($this->Administracion_model->search_dependencia('catag_usuarios',$id,'id_rol')>=1) {
            $this->session->set_flashdata('delete','No se a podido eliminar , usuarios vinculados');
            redirect('roles');
        }
          else {
                     $contador =$this->Administracion_model->search_dependenciax($this->table,$this->codigo_table,$id,'Actividad');
                
                    if ($contador>=1) {
                        $this->session->set_flashdata('delete','No se a podido eliminar el Rol tiene permisos activos');
                        redirect('roles');
                    }
                    
                    elseif(empty($contador)){
                        $this->Administracion_model->destroy_element($this->table2,$this->codigo_table,$id);
                        $this->session->set_flashdata('item','Datos Eliminados');
                     
                        redirect('roles');
                    }

         
          }
      }
         
    }

 

