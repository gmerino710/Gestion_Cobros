<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuarios extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->titulo                      = 'Usuarios';
        $this->general_model->tabla        = 'catag_usuarios';
        $this->general_model->id_tabla     = 'id_usuario';
        $this->general_model->campo_buscar = 'nombre';

        $this->general_model->agregar_campo('id_usuario', 'Codigo', true, 'text', array(), '');
        $this->general_model->agregar_campo('usuario', 'Usuario', true, 'text', array(), 'required|is_unique[catag_usuarios.usuario]');
        $this->general_model->agregar_campo('clave', 'Contraseña', false, 'password', array(), 'required');
        $this->general_model->agregar_campo('nombre', 'Nombre', true, 'text', array(), 'required');
        $this->general_model->agregar_campo('id_rol', 'Rol', true, 'lista', array('id_tabla_relacion' => 'id_rol',
            'tabla'                                                                                       => 'catag_roles',
            'campo_descripcion'                                                                           => 'nombre_rol')
            , 'required');

        $this->general_model->agregar_campo('usu_web_service', 'Usuario para Web Service', false, 'text', array(), '');
        $this->general_model->agregar_campo('pass_web_service', 'Clave para Web Service', false, 'text', array(), '');
        $this->general_model->agregar_campo('id_estado_usuario', 'Estado', true, 'lista',
            array('id_tabla_relacion' => 'id_estado_usuario',
                'tabla'                   => 'catag_estado_usuarios',
                'campo_descripcion'       => 'nombre_estado')
            , 'required');

        $this->general_model->agregar_campo('cant_usuarios', 'Cantidad de Usuarios Permitidos para crear ', false, 'text', array(), 'required');
        $this->general_model->agregar_campo('cat_registro_masivo', 'Cantidad de registros Permitidos para realizar busquedas masivas', false, 'text', array(), 'required');

        $this->general_model->agregar_campo('permiso_login', 'Permiso de acceso', false, 'lista_array',
            array('web'  => 'Sitio Web',
                'webservice' => 'WebService',
                'ambos'      => 'Sitio Web y Web Service')
            , 'required');

    }
    public function index()
    {
        //$this->js[]='dashboard.js';
        $this->sub_titulo    = 'Listado';
        $this->scripts_pie[] = array('vista' => 'scripts/tabla', 'datos' => array('id_tabla' => 'tabla_datos'));
        $this->data['lista'] = $this->general_model->obtener($this->input->post('buscar'));

        $this->vista = 'general/lista';
        $this->load->view($this->plantilla);
    }

    public function nuevo()
    {
        if ($this->input->post('guardar')) {
            foreach ($this->general_model->campos as $key => $value) {
                if ($value['regla']) {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $post['clave'] = encriptar($post['clave']);
                $this->general_model->guardar($post);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos ingresados correctamente.'));
                redirect($this->controlador, 'refresh');
            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }
        $this->sub_titulo = 'Nuevo';
        $this->vista      = 'general/nuevo';
        $this->load->view($this->plantilla);
    }

    public function editar($id = 0)
    {

        $this->data['dato'] = $this->general_model->obtener_uno($id);
        if (!$this->data['dato']) {
            /*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
            'mensaje'=>'El registro no existe'));*/
            redirect($this->controlador, 'refresh');
        }
        $this->data['dato']['clave'] = desencriptar($this->data['dato']['clave']);
        if ($this->input->post('guardar')) {
            foreach ($this->general_model->campos as $key => $value) {
                if ($value['regla'] && $value['nombre'] != 'usuario') {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $post['clave'] = encriptar($post['clave']);
                $this->general_model->actualizar($post, $id);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                redirect($this->controlador, 'refresh');
            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }
        $this->sub_titulo = 'Editar';
        $this->vista      = 'general/editar';
        $this->load->view($this->plantilla);
    }
    public function logo($id)
    {
        $this->data['dato'] = $this->general_model->obtener_uno($id);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {
            $config['upload_path']   = './' . $this->ruta_perfiles;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name']     = $this->data['dato']['id_usuario'];

            /*$config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;*/

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('archivo_logo')) {
                $data        = array('upload_data' => $this->upload->data());
                $dato_imagen = $this->upload->data();
                //$dato_imagen['file_name'];
                $this->usuario_model->actualiza_logo($id, $dato_imagen['file_name']);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                redirect($this->controlador, 'refresh');
            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => $this->upload->display_errors('<p class="text-red" >', '</p>')));
            }

        }
        $this->sub_titulo = 'Cambiar Logo';
        $this->vista      = 'usuarios/logo';
        $this->load->view($this->plantilla);
    }

    public function paises($id = 0)
    {
        $this->data['dato'] = $this->general_model->obtener_uno($id);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {

            if (empty($this->input->post('id_pais'))) {
                $this->session->set_flashdata('mensaje', array(
                    'tipo'    => 'danger',
                    'mensaje' => 'Debe seleccionar un pais'));
            } else {
                $this->usuario_model->agregar_pais($id, $this->input->post('id_pais'));
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro agregado correctamente.'));
                redirect($this->controlador . "/paises/" . $id, 'refresh');
            }

        }

        $this->data['lista'] = $this->usuario_model->obtener_paises_x_usuario($id);

        $this->sub_titulo = 'Permisos a Paises';
        $this->vista      = 'usuarios/lista_paises';
        $this->load->view($this->plantilla);

    }

    public function paises_eliminar($id_usuario = 0, $id_pais = 0)
    {
        $this->usuario_model->eliminar_pais($id_usuario, $id_pais);
        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro eliminado correctamente.'));
        redirect($this->controlador . "/paises/" . $id_usuario, 'refresh');
    }

    public function permisolistas($id = 0)
    {
        $this->data['dato'] = $this->general_model->obtener_uno($id);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {

            if (empty($this->input->post('id_lista'))) {
                $this->session->set_flashdata('mensaje', array(
                    'tipo'    => 'danger',
                    'mensaje' => 'Debe seleccionar una Lista'));
            } else {
                $this->usuario_model->agregar_lista_x_usuario($id, $this->input->post('id_lista'));
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro agregado correctamente.'));
                redirect($this->controlador . "/permisolistas/" . $id, 'refresh');
            }

        }

        $this->data['lista'] = $this->usuario_model->obtener_listas_x_usuario($id);

        $this->sub_titulo = 'Permisos de Listas';
        $this->vista      = 'usuarios/lista_listas';
        $this->load->view($this->plantilla);

    }

    public function permisolistas_eliminar($id_usuario = 0, $id_lista = 0)
    {
        $this->usuario_model->eliminar_lista_x_usuario($id_usuario, $id_lista);
        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro eliminado correctamente.'));
        redirect($this->controlador . "/permisolistas/" . $id_usuario, 'refresh');
    }

    public function ficha_usuario($id = 0)
    {
        $datos_mostrar = array();

        $datos_mostrar['info_usuario'] = $this->general_model->obtener_uno($id);
        if (!$datos_mostrar['info_usuario']) {
            redirect($this->controlador, 'refresh');
        }

        $datos_mostrar['datos_usuarios']     = $this->usuario_model->obtener_usuario_x_usuario_x_id_usuario($id);
        $datos_mostrar['datos_masivo_x_mes'] = $this->usuario_model->obt_reg_masivo_x_mes($id);
        $datos_mostrar['datos_lista_indi']   = $this->usuario_model->obtener_lista_bus_indi($id);

        $this->load->view('usuarios/ficha_usuario', $datos_mostrar);
    }

}
