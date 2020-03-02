<?php
defined('BASEPATH') or exit('No direct script access allowed');

class roles extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->titulo                      = 'Roles';
        $this->general_model->tabla        = 'catag_roles';
        $this->general_model->id_tabla     = 'id_rol';
        $this->general_model->campo_buscar = 'nombre_rol';

        $this->general_model->agregar_campo('id_rol', 'Codigo Rol', true, 'text', array(), '');
        $this->general_model->agregar_campo('nombre_rol', 'Nombre Rol', true, 'text', array(), 'required');
        $this->general_model->agregar_campo('listas_publicas', '¿Ver Listas Publicas?', true, 'sino', array(), 'required');

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

        if ($this->input->post('guardar')) {
            foreach ($this->general_model->campos as $key => $value) {
                if ($value['regla'] && $value['nombre'] != 'usuario') {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);
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

    public function permisos($id)
    {
        $this->data['dato'] = $this->general_model->obtener_uno($id);
        if (!$this->data['dato']) {
            /*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
            'mensaje'=>'El registro no existe'));*/
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {
            $post = $this->input->post();
            $this->usuario_model->actualizar_permisos($post['id_menu'], $id);
            $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
            redirect($this->controlador, 'refresh');
        }
        $this->sub_titulo    = 'Permisos';
        $this->vista         = 'roles/permisos';
        $this->data['menus'] = $this->usuario_model->obtiene_todo_menu();
        $permisos_menu       = $this->usuario_model->obtener_menus_x_rol($id);
        foreach ($this->data['menus'] as $key => $value) {
            $this->data['menus'][$key]['tiene'] = false;
            foreach ($permisos_menu as $key_2 => $value_2) {
                if ($value['id_menu'] == $value_2['id_menu']) {
                    $this->data['menus'][$key]['tiene'] = true;
                    break;
                }
            }

            foreach ($value['hijos'] as $key_2 => $value_2) {
                $this->data['menus'][$key]['hijos'][$key_2]['tiene'] = false;
                foreach ($permisos_menu as $key_3 => $value_3) {
                    if ($value_2['id_menu'] == $value_3['id_menu']) {
                        $this->data['menus'][$key]['hijos'][$key_2]['tiene'] = true;
                        break;
                    }
                }
            }
        }
        $this->load->view($this->plantilla);
    }

}
