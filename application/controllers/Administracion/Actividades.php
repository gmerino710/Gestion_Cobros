<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Actividades extends MY_Controller
{
    public $table = 'catag_actividades';

    public $codigo_table = 'Cod_act';

    public $codigo_union = 'catag_actividades.Estado';

    public $codigo_table2 = 'Cod_sub';

    public $tb2 = 'catag_sub_actividades';

    public $campo = 'Actividad' ;



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

            $this->form_validation->set_rules('actividad','Actividad','required|max_length[40]|min_length[4]|required|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
        ));
            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
           
         


             if ($this->input->post('update')) {
                $data = array(
                    'Actividad'=>$name,
                    'Estado'=>$estado,
                    'modificado_por'=>obtener_usuario()['usuario']
                   );
    
                 $this->Administracion_model->Update_user($data,$this->codigo_table,$id,$this->table);
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('actividades');
             }
             else{

                $data1 = array(
                    'Actividad'=>$name,
                    'Estado'=>$estado,
                    'creado_por'=>obtener_usuario()['usuario']
                   );
                   
                $this->Administracion_model->new_insert($this->table,$data1);
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
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null) {
                redirect('actividades');
            } else {
            $data = [$this->codigo_table,'Actividad','Estado'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,$this->codigo_table,$data,$this->table);
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de actividad';
            $this->vista = 'admin/forms/Actividades_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }

        public function destroy($id=null)
        {
            //$comprobacion = [$this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)];

            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null) {
                redirect('actividades');
            } else {
                // cantidad de los campos q se repite
            $contador =$this->Administracion_model->search_dependencia($this->tb2,$id,'Actividad');
            if ($contador >=1) {
                $this->session->set_flashdata('delete','No se a podido eliminar');
                redirect('actividades');
            }else {
                $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
                $this->session->set_flashdata('item','Datos Eliminados');
             
                redirect('actividades');
            }
           
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
                'Estado'=>$estado,
                'creado_por'=>obtener_usuario()['usuario']
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
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table2,$this->tb2,$this->codigo_table2,$id)==null) {
                redirect('actividades');
            } else {
              $this->Administracion_model->destroy_element('catag_sub_actividades','Cod_sub',$id);
              $this->session->set_flashdata('actividad','Datos Eliminados');
              redirect('actividades');
            }
        }

}        