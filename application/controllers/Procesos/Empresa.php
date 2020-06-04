<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Empresa extends MY_Controller
{
    public $table = 'catag_empresa';

    public $codigo_table = 'Cod_empresa';

        public function index()
        {

            $this->titulo = 'Administración de empresas';
            $this->vista = 'process/Empresa_view';
            $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_empresa','catag_empresa.Estado');
          
            $this->load->view('plantilla/plantilla',$data);

        }

        public function new()
        {

            $this->titulo = 'Nueva empresa ';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'process/forms/Empresa_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }

        //actualizar la fech

        //fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
        //ON UPDATE CURRENT_TIMESTAMP

        public function destroy($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('Empresa');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              $this->session->set_flashdata('item','Datos Eliminados');
           
              redirect('Empresa');
            }
        }

        public function new_element()
        {
            $name =$this->input->post('empresa');
            
            $estado= $this->input->post('estado');

            $id =$this->input->post('id');

            $this->form_validation->set_rules('empresa', 'Empresa', 'required|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
        ));

            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
        

             if ($this->input->post('update')) {
                $data = array(
                    'Empresa'=>$name,
                    'Estado'=>$estado,
                    'modificado_por'=>obtener_usuario()['usuario']
                   );

                  
                  
                 $this->Administracion_model->Update_user($data,$this->codigo_table,$id,$this->table);
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('Empresa');
             }
             else{
                $data1 = array(
                    'Empresa'=>$name,
                    'Estado'=>$estado,
                    'creado_por'=>obtener_usuario()['usuario']
                   );
                $this->Administracion_model->new_insert($this->table,$data1);
                $this->session->set_flashdata('item','Elemento Añadido');
                redirect('Empresa');
             }


           } else {
               if ($id) {
                 $this->edit($id);
               }
                $this->new();
           }
           
          
        }

        public function edit($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('Empresa');
            } else {
            $data = ['Cod_empresa','Empresa','Estado'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,$this->codigo_table,$data,$this->table);
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de empresa';
            $this->vista = 'process/forms/Empresa_form_view';
            $this->load->view('plantilla/plantilla',$data);
            }
        }
        
    }
