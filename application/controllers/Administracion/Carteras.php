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
            if ($id==null) {
                redirect('carteras');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              
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
            $name =$this->input->post('cartera');
            
            $estado= $this->input->post('estado');
            
            $id =$this->input->post('id');
            
            $this->form_validation->set_rules('cartera','Cartera','required|max_length[40]|min_length[4]|alpha');
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
           
            $data = array(
                'Nombre_Cartera'=>$name,
                'Estado'=>$estado
               );

             if ($this->input->post('update')) {
                 
                 $this->Administracion_model->Update_user($data,'Cod_Catera',$id,'catag_carteras');
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('carteras');
             }
             else{
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
            if ($id==null) {
                redirect('carteras');
            } else {
            $data = ['Cod_Catera','Nombre_Cartera'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'Cod_Catera',$data,'catag_carteras');
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Gestor';
            $this->vista = 'admin/forms/Carteras_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }


}