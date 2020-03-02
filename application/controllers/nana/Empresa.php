<?php
defined('BASEPATH') or exit('No direct script access allowed');

class empresa extends CI_Controller
{

    public function salir()
    {
        $usuario_cerrar = obtener_usuario();
        bajar_login();
        if ($usuario_cerrar) {
            redirect('empresa/inicio/' . urlencode(encriptar_num($usuario_cerrar['id_usuario'])), 'refresh');
        } else {
            redirect('inicio', 'refresh');
        }

    }
    public function index()
    {

    }

    public function _ip_no_permitida($datos = array())
    {
        $this->load->view('login/login_ip_no_permitida', $datos);
    }

    public function _obtener_ip_cliente()
    {

        $ip_del_cliente = $this->input->server('HTTP_X_FORWARDED_FOR');

        if (!$ip_del_cliente) {
            $ip_del_cliente = $this->input->ip_address();
        }
        return $ip_del_cliente;
    }

    public function inicio($id_usuario = 0)
    {
        if (!$id_usuario) {
            redirect('inicio', 'refresh');
        }

        $id_usuario            = desencriptar_num(urldecode($id_usuario));
        $data['datos_empresa'] = $this->usuario_model->obtiene_por_id($id_usuario);

        if (!$data['datos_empresa']) {
            redirect('inicio', 'refresh');
        }

        //si hay ip definidas, valido que este en la lista
        $ip_cliente = $this->_obtener_ip_cliente();

        $array_ip = explode(',', $ip_cliente);

        $ip_permitidas = $this->usuario_model->obtiene_ip_permitidas($id_usuario);
        $acceder_login = false;

        if ($ip_permitidas) {

            foreach ($array_ip as $ip_actual) {
                foreach ($ip_permitidas as $ip) {
                    if ($ip['ip'] == $ip_actual) {
                        $acceder_login = true;
                    }
                }
            }

        } else {
            $acceder_login = true;
        }

        if (!$acceder_login) {
            $this->_ip_no_permitida(array('ip_cliente' => $ip_cliente));
            //redirect('empresa/ip_no_permitida', 'refresh');
        } else {

            $data['error'] = '';
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('clave', 'Clave', 'required');
            if ($this->form_validation->run() == true) {
                $post   = $this->input->post();
                $existe = $this->usuario_model->obtener_por_usuario_clave_empresa($post['usuario'], $post['clave'], $data['datos_empresa']['id_usuario']);
                if ($existe) {
                    /*$estado=$this->usuario_model->obtener_estado($existe['id_estado_usuario']);
                    if($estado['id_estado_usuario']==1)
                    {*/
                    $usuario_empresa                    = $data['datos_empresa'];
                    $usuario_empresa['rol']             = $this->usuario_model->obtener_rol($data['datos_empresa']['id_rol']);
                    $existe['perfil']                   = $this->usuario_model->obtener_perfil($usuario_empresa['id_usuario'], $existe['codigo_perfil']);
                    $usuario_empresa['usuario_empresa'] = $existe;
                    $this->usuario_model->registrar_login($existe['usuario'], $existe['id_usuario']);
                    levantar_login($usuario_empresa);
                    redirect('sistema', 'refresh');
                    /*}else{
                $data['error']='<label class="control-label"><i class="fa fa-times-circle-o"></i> El usuario tiene estado '.$estado['nombre_estado'].'</label>';
                }*/
                } else {
                    $data['error'] = '<label class="control-label"><i class="fa fa-times-circle-o"></i> Usuario o clave no son correctas</label>';
                }
            } else {
                $data['error'] = validation_errors('<label class="control-label"><i class="fa fa-times-circle-o"></i> ', '</label>');
            }

            $this->load->view('login/login_empresa', $data);
        }
    }

}
