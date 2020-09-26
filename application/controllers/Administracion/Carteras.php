<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Carteras extends MY_Controller
{
    public $table = 'catag_carteras';

    public $codigo_table = 'Cod_Catera';

        public function index()
        {

            $this->titulo = 'Administración de Carteras';
            $this->vista = 'admin/Carteras_view';
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_carteras','catag_carteras.Estado');
          
            $this->load->view('plantilla/plantilla',$data);

        }

        public function destroy($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                $this->session->set_flashdata('err','No se puede eliminar'); 
                redirect('carteras');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              $this->session->set_flashdata('item','Usuario Eliminado');
              redirect('carteras');
            }
        }
        
        public function new()
        {

            $this->titulo = 'Nueva Cartera';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/forms/Carteras_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }


        public function new_element()
        {
            $codigo =$this->input->post('cod_cartera');

            $name =$this->input->post('cartera');
            
            $estado= $this->input->post('estado');
            
            $id =$this->input->post('id');
            
            $this->form_validation->set_rules('cartera','Carteras','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'));
            $this->form_validation->set_rules('cod_cartera','Codigo cartera','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales'));
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
           

             if ($this->input->post('update')) {
                $data = array(
                    'Cod_catera'=>$codigo,
                    'Nombre_Cartera'=>$name,
                    'Estado'=>$estado,
                    'modificado_por'=>obtener_usuario()['usuario']
                   );
                 
                 $this->Administracion_model->Update_user($data,'Cod_Catera',$id,'catag_carteras');
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('carteras');
             }
             else{
                $data = array(
                    'Cod_catera'=>$codigo,
                    'Nombre_Cartera'=>$name,
                    'Estado'=>$estado,
                    'creado_por'=>obtener_usuario()['usuario']
                   );
                $this->Administracion_model->new_insert('catag_carteras',$data);
                $this->session->set_flashdata('item','Elemento Añadido');
                redirect('carteras');
             }


           } else {
            if ($id) {
                $this->edit_user($id);
              }
               $this->new();
           }
           
          
        }

        public function edit_user($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null) {
                redirect('carteras');
            } else {
            $data = ['Cod_catera','Nombre_Cartera','Estado'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'Cod_Catera',$data,'catag_carteras');
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Gestor';
            $this->vista = 'admin/forms/Carteras_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }


}