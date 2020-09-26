<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Promesas extends MY_Controller
{
    public $table = 'catag_promesa_pago';

    public $codigo_table = 'id';

        public function index()
        {
            $this->titulo = 'Administración de Promesas de Pago';
            $this->vista = 'admin/Promesas_view';
            $data['administracion'] = $this->Administracion_model->get_field($this->table);
          
            $this->load->view('plantilla/plantilla',$data);

        }

        public function new()
        {

            $this->titulo = 'Nueva Promesa de pago';
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->vista = 'admin/forms/Promesa_form_view';
            $this->load->view('plantilla/plantilla',$data);

        }

        public function destroy($id=null)
        {
            if ($id==null or $this->Administracion_model->validate_existencia_id($this->codigo_table,$this->table,$this->codigo_table,$id)==null ) {
                redirect('Promesas');
            } else {
              $this->Administracion_model->destroy_element($this->table,$this->codigo_table,$id);
              $this->session->set_flashdata('item','Datos Eliminados');
           
              redirect('Promesas');
            }
        }


        public function new_element()
        {
            
            $desc =$this->input->post('descrip');
            
            $estado= $this->input->post('estado');

            $id =$this->input->post('id');

            $this->form_validation->set_rules('estado', 'Estado', 'required|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
        ));
        
        $this->form_validation->set_rules('descrip', 'Descripcion', 'required|regex_match[/^([a-zA-Z]|\s)+$/]',
        array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
    ));

        


            
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
        

             if ($this->input->post('update')) {
                $data = array(
                    
                    'Estado'=>$estado,
                    'Descripcion'=>$desc,
                    'modificado_por'=>obtener_usuario()['usuario']
                   );

                  
                  
                 $this->Administracion_model->Update_user($data,$this->codigo_table,$id,$this->table);
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('Promesas');
             }
             else{
                $data1 = array(
                    
                    'Estado'=>$estado,
                    'Descripcion'=>$desc,
                    'creado_por'=>obtener_usuario()['usuario']
                   );
                $this->Administracion_model->new_insert('catag_promesa_pago',$data1);
                $this->session->set_flashdata('item','Elemento Añadido');
                redirect('Promesas');
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
                redirect('Promesas');
            } else {
            $data = ['id','Nombre','descripcion','Estado'];  
            $data['old'] =  $this->Administracion_model->obter_datos_adminitracion($id,'id',$data,'Promesa_pago');
            $data['estados']= $this->Administracion_model->get_estado_usuario();
            $this->titulo = 'Actualizacion de Promesa de pago';
            $this->vista = 'admin/forms/Promesa_form_view';
            $this->load->view('plantilla/plantilla',$data);
            
            }
        }

/*
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

            $this->form_validation->set_rules('accion', 'Acciones', 'required|regex_match[/^([a-zA-Z]|\s)+$/]',
            array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
        ));

            $this->form_validation->set_rules('estado','Estado','required');
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            //si entra
           if ($this->form_validation->run()==true) {
        

             if ($this->input->post('update')) {
                $data = array(
                    'Accion'=>$name,
                    'Estado'=>$estado,
                    'modificado_por'=>obtener_usuario()['usuario']
                   );

                  
                  
                 $this->Administracion_model->Update_user($data,'Cod_accion',$id,'catag_acciones');
                 $this->session->set_flashdata('item','Datos Actualizados');
                  redirect('acciones');
             }
             else{
                $data1 = array(
                    'Accion'=>$name,
                    'Estado'=>$estado,
                    'creado_por'=>obtener_usuario()['usuario']
                   );
                $this->Administracion_model->new_insert('catag_acciones',$data1);
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
        */
   }