<?php
defined('BASEPATH') or exit('No direct script access allowed');

class perfil extends MY_Controller
{


    public function index()
    {
        if (isset($this->usuario['usuario_empresa'])) {
            $this->datos_usuario();
        } else {
            $this->datos_admin();
        }
    }
    public function datos_admin()
    {
        if ($this->input->post('guardar')) {

            $post = $this->input->post();

            $logo = $this->input->post('archivo_logo');


            
            if ( empty($post['clave']) and empty($logo) ) {
               
                
                $this->titulo     = 'Mi perfil';
                $this->sub_titulo = 'Información de la cuenta';
                //$this->js[]='dashboard.js';
                $this->vista = 'usuarios/perfil';
                $this->load->view('plantilla/plantilla');

            }

            ///******************* */ clave hay *********************************/

            if ($post['clave'] != null and $logo==null ) {
            

                $this->form_validation->set_rules('clave', 'Contraseña', 'required|regex_match[/^[a-zA-Z0-9]{8,20}$/]',
                array( 'regex_match' => 'La Contraseña no tiene el formato correcto (Debe tener minimo 8 caracteres y contener letras y números, sin caracteres especiales)',
                )
                );
    
    
                 $this->form_validation->set_rules('repetido', 'Confirmacion', 'required|matches[clave]|regex_match[/^[a-zA-Z0-9]{8,20}$/]');


                 if ($this->form_validation->run() == true) {
                    unset($post['guardar']);
                    $clave      = encriptar($post['clave']);
                    $this->usuario_model->actualiza_clave($this->usuario['id_usuario'], $clave);
                    $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                    $existe        = $this->usuario_model->obtiene_por_id($this->usuario['id_usuario']);
                    $existe['rol'] = $this->usuario_model->obtener_rol($existe['id_rol']);
                    levantar_login($existe);

                    redirect($this->controlador, 'refresh');
                 }else {
                    $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));

                    redirect($this->controlador, 'refresh');
                 }
            }
            if ($post['clave'] == null and $this->usuario['logo']!=null ) {
               
                
                $logo   = $this->usuario['logo'];
             

                if (($_FILES['archivo_logo']['size']) > 0) {
                    @unlink($this->ruta_perfiles . $logo);
                    $config['upload_path']   = './' . $this->ruta_perfiles;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name']     = $this->usuario['id_usuario'];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('archivo_logo')) {
                        $data        = array('upload_data' => $this->upload->data());
                        $dato_imagen = $this->upload->data();
                        $logo        = $dato_imagen['file_name'];
                        $this->usuario_model->actualiza_logo($this->usuario['id_usuario'], $logo);

                        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                        $existe        = $this->usuario_model->obtiene_por_id($this->usuario['id_usuario']);
                        $existe['rol'] = $this->usuario_model->obtener_rol($existe['id_rol']);
                        levantar_login($existe);
    
                        redirect($this->controlador, 'refresh');
                    } else {
                        $error_logo = true;
                        $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                            'mensaje'                                             => $this->upload->display_errors('<p class="text-red" >', '</p>')));
                    }
                }
                else {
                    $error_logo = false;
                }
                
              

            }   
                

          

        }else{

        $this->titulo     = 'Mi perfil';
        $this->sub_titulo = 'Información de la cuenta';
        //$this->js[]='dashboard.js';
        $this->vista = 'usuarios/perfil';
        $this->load->view('plantilla/plantilla');
        }
    }

        public function Logo_empresa()
        {

            if ($this->input->post('guardar')) {
                

                $logo = $this->logos;
    
                if (($_FILES['archivo_logo']['size']) > 0) {
                    @unlink($this->ruta_logos . $logo);
                    $config['upload_path']   = './' . $this->ruta_logos;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name']     = 'Logo-empresa';
                    $config['overwrite'] = true;
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('archivo_logo')) {
                        $data        = array('upload_data' => $this->upload->data());
                        $dato_imagen = $this->upload->data();
                        $logo        = $dato_imagen['file_name'];
                        $this->usuario_model->actualiza_logo_empresa($this->usuario['id_usuario'], $logo);
    
                        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                        $existe        = $this->usuario_model->obtiene_por_id($this->usuario['id_usuario']);
                        $existe['rol'] = $this->usuario_model->obtener_rol($existe['id_rol']);
                        levantar_login($existe);
    
                        redirect('/parametros', 'refresh');

                    } else {
                        $error_logo = true;
                        $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                            'mensaje'                                             => $this->upload->display_errors('<p class="text-red" >', '</p>')));

                            redirect('/parametros', 'refresh');
                        
                    }
                }
                else {
                    $error_logo = false;

            
                    redirect('/parametros', 'refresh');
                }



            }

         


        }



}
