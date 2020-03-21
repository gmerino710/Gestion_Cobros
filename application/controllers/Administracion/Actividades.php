<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Actividades extends MY_Controller
{
    public $table = 'catag_actividades';

    public $codigo_table = 'Cod_act';

    public $codigo_union = 'catag_actividades.Estado';

        public function index()
        {

            $this->titulo = 'Administración de Actividades';
            $this->vista = 'admin/Actividades_view';
            // actividdad
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,$this->table,$this->codigo_union);
            //sub actividad

            $data['sub']= $this->Administracion_model->Sub_at();

            $this->load->view('plantilla/plantilla',$data);



        }

        public function new()
        {
            $this->titulo = 'Nueva actividad';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/forms/Actividades_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }
        public function new_element()
        {
            $name =$this->input->post('actividad');
            
            $estado= $this->input->post('estado');

            $id =$this->input->post('id');

            $this->form_validation->set_rules('actividad','Actividad','required|max_length[40]|min_length[4]|alpha_numeric_spaces|is_unique[catag_actividades.Actividad]');
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
           
            $data = array(
                'Actividad'=>$name,
                'Estado'=>$estado
               );

             if ($this->input->post('update')) {
                 $this->Administracion_model->Update_user($data,$this->codigo_table,$id,$this->table);
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('actividades');
             }
             else{
                $this->Administracion_model->new_insert($this->table,$data);
                $this->session->set_flashdata('item','Elemento Añadido');
                redirect('actividades');
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
                redirect('actividades');
            } else {
            $data = [$this->codigo_table,'Actividad'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,$this->codigo_table,$data,$this->table);
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de actividad';
            $this->vista = 'admin/forms/Actividades_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }

        public function destroy($id=null)
        {
            if ($id==null) {
                redirect('actividades');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              $this->session->set_flashdata('item','Datos Eliminados');
           
              redirect('actividades');
            }
        }


        // sub actividad

        public function new_sub()
        {
            $this->titulo = 'Nueva subactividad';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $data['actvity']=  $this->Administracion_model->Items_actividad();
            $this->vista = 'admin/forms/Subactividad_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }


        public function sub()
        {
                redirect('actividades');

                
        }

        public function new_element_sub()
        {
            $name =$this->input->post('nombre');
            $actividad=$this->input->post('actividad');
            $estado= $this->input->post('estado');
            

            $this->form_validation->set_rules('nombre','Subactividad','required|max_length[40]|min_length[4]|alpha');
          //  $this->form_validation->set_rules('apellido','Apellido','required|max_length[40]|min_length[4]1alpha');
            //$this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
            $data = array(
                'Subactividad'=>$name,
                'Actividad'=>$actividad,
                'Estado'=>$estado
               );
    
               $this->Administracion_model->new_insert('catag_sub_actividades',$data);
               $this->session->set_flashdata('actividad','Elemento Añadido');
               redirect('actividades');
           } else {
            $this->new_sub();
           }
           
          
        }



        public function destroy_sub($id=null)
        {
            if ($id==null) {
                redirect('actividades');
            } else {
              $this->Administracion_model->destroy_element('catag_sub_actividades','Cod_sub',$id);
              $this->session->set_flashdata('actividad','Datos Eliminados');
              redirect('actividades');
            }
        }

}        