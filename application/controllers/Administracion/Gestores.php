<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Gestores extends MY_Controller
{

        public function index()
        {

            $this->titulo = 'Administración de Gestores';
            $this->vista = 'admin/Gestores_view';
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion();
          
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
            

            $this->form_validation->set_rules('nombre','Nombre','required|max_length[40]|min_length[4]|alpha');
            $this->form_validation->set_rules('apellido','Apellido','required|max_length[40]|min_length[4]1alpha');
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<ul class="text-danger">', '</ul>');

            //si entra
           if ($this->form_validation->run()==true) {
            $data = array(
                'Nombre'=>$name,
                'Apellido'=>$apellido,
                'Estado'=>$estado
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
            if ($id==null) {
                redirect('gestores');
            } else {
              $this->Administracion_model->destroy_element('catag_gestores',$id);
              
              redirect('gestores');
            }
        }


        


}       