<?php
defined('BASEPATH') or exit('No direct script access allowed');

class misusuarios extends MY_Controller
{
    public $vista_control = "general_usuario";

    public $valida_unico = "0";

    public $cod_unicos = array();

    public function __construct()
    {
        parent::__construct();

        $this->titulo                                = 'Mis Usuarios';
        $this->mante_usuario_model->tabla            = 'usuarios_x_usuarios';
        $this->mante_usuario_model->id_tabla         = 'id_usuario_em';
        $this->mante_usuario_model->campo_buscar     = 'nombre';
        $this->mante_usuario_model->id_usuario       = $this->usuario['id_usuario'];
        $this->mante_usuario_model->id_unico_usuario = "usuario";
        $this->mante_usuario_model->agregar_campo('usuario', 'Usuario', true, 'text', array(), 'required|callback_validar_unico');
        $this->mante_usuario_model->agregar_campo('clave', 'Contraseña', false, 'password', array(), 'required');
        $this->mante_usuario_model->agregar_campo('nombre', 'Nombre', true, 'text', array(), 'required');
        $this->mante_usuario_model->agregar_campo('codigo_perfil', 'Perfil', true, 'cata_usu', array(
            'tabla'             => 'perfiles',
            'id_tabla_relacion' => 'codigo_perfil',
            'campo_descripcion' => 'nombre_perfil',
        )
            , 'required');

        $this->mante_usuario_model->agregar_campo('id_estado_usuario', 'Estado', true, 'lista', array(
            'tabla'             => 'catag_estado_usuarios',
            'id_tabla_relacion' => 'id_estado_usuario',
            'campo_descripcion' => 'nombre_estado',
        )
            , 'required');
        $this->mante_usuario_model->agregar_campo('ver_relaciones', '¿Puede ver arbol de relaciones?', false, 'sino', array(), '');

    }

    public function validar_unico($valor)
    {
        if ($this->valida_unico == "0") {
            if ($this->mante_usuario_model->existe($valor)) {
                $this->form_validation->set_message('validar_unico', 'El {field} ya existe, este valor debe ser único.');
                return false;
            } else {
                return true;
            }
        } else {
            if ($this->valida_unico != $valor) {
                if ($this->mante_usuario_model->existe($valor)) {
                    $this->form_validation->set_message('validar_unico', 'El {field} ya existe, este valor debe ser único.');
                    return false;
                } else {
                    return true;
                }

            } else {
                return true;
            }
        }

    }

    public function index()
    {
        //$this->js[]='dashboard.js';
        $this->sub_titulo    = 'Listado';
        $this->scripts_pie[] = array('vista' => 'scripts/tabla', 'datos' => array('id_tabla' => 'tabla_datos'));
        $this->data['lista'] = $this->mante_usuario_model->obtener($this->input->post('buscar'));

        $this->vista = $this->vista_control . '/lista';
        $this->load->view($this->plantilla);
    }

    public function nuevo()
    {

        $cantidad_actual = $this->usuario_model->obtener_cantidad_usuarios($this->usuario['id_usuario']);

        if (($cantidad_actual + 1) > $this->usuario['cant_usuarios'] and $this->usuario['cant_usuarios'] != 0) {
            $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                'mensaje'                                             => 'Ha superado la creacion de usuario, su limite es: ' . $this->usuario['cant_usuarios']));
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {
            foreach ($this->mante_usuario_model->campos as $key => $value) {
                if ($value['regla']) {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }

            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $post['clave'] = encriptar($post['clave']);
                $this->mante_usuario_model->guardar($post);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos ingresados correctamente.'));
                redirect($this->controlador, 'refresh');
            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }
        $this->sub_titulo = 'Nuevo';
        $this->vista      = $this->vista_control . '/nuevo';
        $this->load->view($this->plantilla);
    }

    public function editar($id = 0)
    {

        $this->data['dato'] = $this->mante_usuario_model->obtener_uno($id);
        if (!$this->data['dato']) {
            /*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
            'mensaje'=>'El registro no existe'));*/
            redirect($this->controlador, 'refresh');
        }
        $this->data['dato']['clave'] = desencriptar($this->data['dato']['clave']);
        if ($this->input->post('guardar')) {
            $this->valida_unico = $this->data['dato'][$this->mante_usuario_model->id_unico_usuario];

            foreach ($this->mante_usuario_model->campos as $key => $value) {
                if ($value['regla'] && $value['nombre'] != 'usuario') {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
                $post['clave'] = encriptar($post['clave']);
                $this->mante_usuario_model->actualizar($post, $id);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
                redirect($this->controlador, 'refresh');
            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger',
                    'mensaje'                                             => validation_errors('<p class="text-red" >', '</p>')));
            }

        }
        $this->sub_titulo = 'Editar';
        $this->vista      = $this->vista_control . '/editar';
        $this->load->view($this->plantilla);
    }

    public function eliminar($id = 0)
    {

        $this->data['dato'] = $this->mante_usuario_model->obtener_uno($id);
        if (!$this->data['dato']) {
            /*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
            'mensaje'=>'El registro no existe'));*/
            redirect($this->controlador, 'refresh');
        }

        $this->mante_usuario_model->eliminar($id);
        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro eliminado correctamente.'));
        redirect($this->controlador, 'refresh');
    }

}
