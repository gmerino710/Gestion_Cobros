<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Acciones extends MY_Controller
{
    public $table = 'catag_acciones';

    public $codigo_table = 'Cod_accion';

        public function index()
        {

            $this->titulo = 'Administración de Acciones';
            $this->vista = 'admin/Acciones_view';
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_acciones','catag_acciones.Estado');
          
            $this->load->view('plantilla/plantilla',$data);

        }

        public function new()
        {

            $this->titulo = 'Nueva accion';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/forms/Acciones_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }

        //actualizar la fech

        //fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
        //ON UPDATE CURRENT_TIMESTAMP

        public function destroy($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('acciones');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              $this->session->set_flashdata('item','Datos Eliminados');
           
              redirect('acciones');
            }
        }

        public function new_element()
        {
            $name =$this->input->post('accion');
            
            $estado= $this->input->post('estado');
            $id =$this->input->post('id');

            $this->form_validation->set_rules('accion','Acciones','required|max_length[40]|min_length[4]|alpha|is_unique[catag_acciones.Accion]');
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
           
            $data = array(
                'Accion'=>$name,
                'Estado'=>$estado
               );

             if ($this->input->post('update')) {
                 $this->Administracion_model->Update_user($data,'Cod_accion',$id,'catag_acciones');
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('acciones');
             }
             else{
                $this->Administracion_model->new_insert('catag_acciones',$data);
                $this->session->set_flashdata('item','Elemento Añadido');
                redirect('acciones');
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
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('acciones');
            } else {
            $data = ['Cod_accion','Accion'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'Cod_accion',$data,'catag_acciones');
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Accion';
            $this->vista = 'admin/forms/Acciones_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }
        
    }
