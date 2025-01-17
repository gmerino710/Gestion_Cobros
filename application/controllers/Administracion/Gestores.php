<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Gestores extends MY_Controller
{
    private $table = 'catag_gestores';
    private $codigo_table = 'Cod_Gestores';

   

        public function index()
        {

            $this->titulo = 'Administración de Gestores';
            $this->vista = 'admin/Gestores_view';
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_gestores','catag_gestores.Estado');
          
            $this->load->view('plantilla/plantilla',$data);

        }
       
        public function new()
        {

            $this->titulo = 'Nuevo Gestor';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/Gestores_form/Gestores_new_view';
            $this->load->view('plantilla/plantilla',$data);

        }

        public function new_element()
        {
            $name =$this->input->post('nombre');
            $apellido=$this->input->post('apellido');
            $estado= $this->input->post('estado');
            $gestor= $this->input->post('gestor');

            $this->form_validation->set_rules('gestor','Gestor','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'
        ));

            $this->form_validation->set_rules('nombre','Nombre','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'
        ));
            $this->form_validation->set_rules('apellido','Apellido','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'
        ));
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
            $data = array(
                'Cod_Gestores'=>$gestor,
                'Nombre'=>$name,
                'Apellido'=>$apellido,
                'Estado'=>$estado,
                'creado_por'=>obtener_usuario()['usuario']
               );
    
               $this->Administracion_model->new_insert('catag_gestores',$data);
               $this->session->set_flashdata('item','Elemento Añadido');
               redirect('gestores');
           } else {
            $this->titulo = 'Nuevo Gestor';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/Gestores_form/Gestores_new_view';
            $this->load->view('plantilla/plantilla',$data);
           }
           
          
        }

        public function destroy($id=null)
        {
            if ($id==null or $this->Administracion_model->Dependency($this->table,$id,$this->codigo_table)) {
                $this->session->set_flashdata('err','No se puede eliminar'); 
                redirect('gestores');
            } else {
              $this->Administracion_model->destroy_element('catag_gestores','Cod_Gestores',$id);
              $this->session->set_flashdata('item','Usuario Eliminado');
              redirect('gestores');
            }
        }

        public function edit_user($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('gestores');
            } else {
                $data = ['Cod_Gestores','Nombre', 'Apellido','Estado'];  

            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'Cod_Gestores',$data,'catag_gestores');
           
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Gestor';
            $this->vista = 'admin/Gestores_form/Gestores_update';
            $this->load->view('plantilla/plantilla',$data);
            }
        }

        public function update()
        {
            $table = 'catag_gestores';
            $id = $this->input->post('id');
           
            $name =$this->input->post('nombre');
            $apellido=$this->input->post('apellido');
            $estado= $this->input->post('estado');
            $gestor= $this->input->post('gestor');

       
            //------------------------------------------------------
            $this->form_validation->set_rules('gestor','Gestor','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'
        ));
            $this->form_validation->set_rules('nombre','Nombre','required|max_length[40]|min_length[4]|regex_match[/^[][a-zA-Z-@# ,().]+$/]');
            $this->form_validation->set_rules('apellido','Apellido','required|max_length[40]|min_length[4]|regex_match[/^[][a-zA-Z-@# ,().]+$/]');
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<ul class="text-danger">', '</ul>');
        

          if ($this->form_validation->run()==True) {
            $data = array(
                'Cod_Gestores'=>$gestor,
                'Nombre'=>$name,
                'Apellido'=>$apellido,
                'Estado'=>$estado,
                'modificado_por'=>obtener_usuario()['usuario']
               );
            $this->Administracion_model->Update_user($data,'Cod_Gestores',$id,$table);
            $this->session->set_flashdata('item','Datos Actualizados');
            redirect('gestores');
          } else {
            $data = ['Cod_Gestores','Nombre', 'Apellido','Estado'];
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'Cod_Gestores',$data,'catag_gestores');
           
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Gestor';
            $this->vista = 'admin/Gestores_form/Gestores_update';
            $this->load->view('plantilla/plantilla',$data);
          }
          
            
         
        }
        


}       