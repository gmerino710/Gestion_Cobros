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
            $this->form_validation->set_rules('clave', 'Contraseña', 'required|regex_match[/^[a-zA-Z0-9]{8,20}$/]',
                array(
                    'regex_match' => 'La Contraseña no tiene el formato correcto (Debe tener minimo 8 caracteres y contener letras y números, sin caracteres especiales)',
                )
            );
    
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $clave      = encriptar($post['clave']);
                
                $this->usuario_model->actualiza_clave($this->usuario['id_usuario'], $clave);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                $existe        = $this->usuario_model->obtiene_por_id($this->usuario['id_usuario']);
                $existe['rol'] = $this->usuario_model->obtener_rol($existe['id_rol']);
                levantar_login($existe);

                redirect($this->controlador, 'refresh');

            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }

        $this->titulo     = 'Mi perfil';
        $this->sub_titulo = 'Información de la cuenta';
        //$this->js[]='dashboard.js';
        $this->vista = 'usuarios/perfil';
        $this->load->view('plantilla/plantilla');
    }
    public function datos_usuario()
    {
        if ($this->input->post('guardar')) {
            $this->form_validation->set_rules('clave', 'Contraseña', 'required|regex_match[/^[a-zA-Z0-9]{8,20}$/]',
                array(
                    'regex_match' => 'La Contraseña no tiene el formato correcto (Debe tener minimo 8 caracteres y contener letras y números, sin caracteres especiales)',
                )
            );
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');

            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $clave  = encriptar($post['clave']);
                $nombre = ($post['nombre']);
                $this->usuario_model->actualiza_clave_nombre_usuario_emp($this->usuario['usuario_empresa']['id_usuario_em'], $clave, $nombre);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                $existe                              = $this->usuario;
                $existe['usuario_empresa']           = $this->usuario_model->obtener_usuario_x_usuario_x_id($this->usuario['usuario_empresa']['id_usuario_em']);
                $existe['usuario_empresa']['perfil'] = $this->usuario_model->obtener_perfil($this->usuario['id_usuario'], $existe['usuario_empresa']['codigo_perfil']);

                levantar_login($existe);

                redirect($this->controlador, 'refresh');

            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }

        $this->titulo     = 'Mi perfil';
        $this->sub_titulo = 'Información de la cuenta';
        //$this->js[]='dashboard.js';
        $this->vista = 'usuarios/perfil_usuario';
        $this->load->view('plantilla/plantilla');
    }

}
