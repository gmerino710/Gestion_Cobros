<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inicio extends CI_Controller
{

    public function salir()
    {
        bajar_login();
        redirect('inicio', 'refresh');
    }

    public function index()
    {

        if (obtener_usuario()) {
            redirect('sistema', 'refresh');
        }

        $data['error'] = '';
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('clave', 'Clave', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == true) {
            $post   = $this->input->post();
            $existe = $this->usuario_model->obtener_por_usuario_clave($post['usuario'], $post['clave']);
            if ($existe) {
                $estado = $this->usuario_model->obtener_estado($existe['id_estado_usuario']);
                if ($estado['id_estado_usuario'] == 1) {
                    if ($existe['permiso_login'] == 'web') {
                        $existe['rol'] = $this->usuario_model->obtener_rol($existe['id_rol']);
                        $this->usuario_model->registrar_login($existe['usuario'], $existe['id_usuario']);
                        levantar_login($existe);
                        redirect('sistema', 'refresh');
                    } else {
                        $data['error'] = '<label class="control-label"><i class="fa fa-times-circle-o"></i> El usuario solo tiene acceso via WebService </label>';
                    }

                } else {
                    $data['error'] = '<label class="control-label"><i class="fa fa-times-circle-o"></i> El usuario tiene estado ' . $estado['nombre_estado'] . '</label>';
                }
            } else {
                $data['error'] = '<label class="control-label"><i class="fa fa-times-circle-o"></i> Usuario o clave no son correctas</label>';
            }
        } 

        $this->load->view('login/login', $data);
    }

}
