<?php
defined('BASEPATH') or exit('No direct script access allowed');

class misperfiles extends MY_Controller
{
    public $vista_control = "general_usuario";

    public $valida_unico = "0";

    public $cod_unicos = array();

    public function __construct()
    {
        parent::__construct();

        $this->titulo                                = 'Mis Perfiles';
        $this->mante_usuario_model->tabla            = 'perfiles';
        $this->mante_usuario_model->id_tabla         = 'id_perfil';
        $this->mante_usuario_model->campo_buscar     = 'nombre_perfil';
        $this->mante_usuario_model->id_usuario       = $this->usuario['id_usuario'];
        $this->mante_usuario_model->id_unico_usuario = "codigo_perfil";

        $this->mante_usuario_model->agregar_campo('codigo_perfil', 'Codigo Perfil', true, 'text', array(), 'required|callback_validar_unico');
        $this->mante_usuario_model->agregar_campo('nombre_perfil', 'Nombre Perfil', true, 'text', array(), 'required');
        $this->mante_usuario_model->agregar_campo('consulta_x_coincidencia', '¿Permite busqueda por coincidencia?', true, 'sino', array(), 'required');
        $this->mante_usuario_model->agregar_campo('porcentaje_coincidencia', 'Porcentaje fijo de coincidencia', false, 'text', array(), 'numeric');

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
        if ($this->input->post('guardar')) {
            foreach ($this->mante_usuario_model->campos as $key => $value) {
                if ($value['regla']) {
                    $this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
                }
            }

            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                unset($post['guardar']);

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
        $this->db->delete('perfiles_menu', array('id_usuario' => $this->usuario['id_usuario'], 'id_perfil' => $id));
        $this->mante_usuario_model->eliminar($id);
        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro eliminado correctamente.'));
        redirect($this->controlador, 'refresh');
    }

    public function accesos($id)
    {
        $this->data['dato'] = $this->mante_usuario_model->obtener_uno($id);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {
            $post = $this->input->post();
            $this->usuario_model->actualizar_permisos_perfiles($post['id_menu'], $id);
            $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
            redirect($this->controlador, 'refresh');
        }
        $this->sub_titulo    = 'Accesos por Perfil';
        $this->vista         = $this->vista_control . '/accesos_x_perfil';
        $this->data['menus'] = $this->usuario_model->obtiene_menu($this->usuario['id_rol']);
        $permisos_menu       = $this->usuario_model->obtener_menus_x_perfil($id);
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

    public function contadores($id)
    {
        $this->data['dato'] = $this->mante_usuario_model->obtener_uno($id);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {
            $post = $this->input->post();
            $this->param_model->actualizar_contadores_perfiles($post['contadores'], $id);
            $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos actualizados correctamente.'));
            redirect($this->controlador, 'refresh');
        }
        $this->sub_titulo         = 'Contadores por Perfil';
        $this->vista              = $this->vista_control . '/contadores_x_perfil';
        $this->data['contadores'] = $this->param_model->obtener_contadores();
        $contadores_select        = $this->param_model->obtener_contadores_x_perfil($this->usuario['id_usuario'], $id);
        foreach ($this->data['contadores'] as $key => $value) {
            $this->data['contadores'][$key]['tiene'] = false;
            foreach ($contadores_select as $key_2 => $value_2) {
                if ($value['id_contador'] == $value_2['id_contador']) {
                    $this->data['contadores'][$key]['tiene'] = true;
                    break;
                }
            }

        }
        $this->load->view($this->plantilla);
    }

    public function listas($id_perfil = 0)
    {
        $this->data['id_perfil'] = $id_perfil;
        $this->data['dato']      = $this->mante_usuario_model->obtener_uno($id_perfil);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }

        if ($this->input->post('guardar')) {

            if ($this->input->post('id_lista')) {

                $datos_guardar['id_lista']   = $this->input->post('id_lista');
                $datos_guardar['id_usuario'] = $this->usuario['id_usuario'];
                $datos_guardar['id_perfil']  = $id_perfil;

                $this->listas_model->insertar_lista_x_perfil($datos_guardar);
                $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Datos ingresados correctamente.'));
                redirect($this->controlador . "/listas/" . $id_perfil, 'refresh');

            } else {
                $this->session->set_flashdata('mensaje', array('tipo' => 'danger', 'mensaje' => 'Debe seleccionar una lista.'));
                redirect($this->controlador . "/listas/" . $id_perfil, 'refresh');
            }

        }

        $this->data['listas_dispo'] = $this->listas_model->obtiene_mis_listas_x_usuario($this->usuario['id_usuario'], $id_perfil);

        $this->sub_titulo    = 'Accesos a listas para ' . $this->data['dato']['nombre_perfil'];
        $this->data['lista'] = $this->listas_model->obtiene_listas_x_perfil($this->usuario['id_usuario'], $id_perfil);
        $this->vista         = 'listas/listas_x_perfil';
        $this->load->view($this->plantilla);
    }

    public function eliminar_lista($id = 0, $id_perfil = 0)
    {
        $this->data['dato'] = $this->mante_usuario_model->obtener_uno($id_perfil);
        if (!$this->data['dato']) {
            redirect($this->controlador, 'refresh');
        }
        $this->listas_model->eliminar_lista_x_perfil($id);
        $this->session->set_flashdata('mensaje', array('tipo' => 'success', 'mensaje' => 'Registro eliminado correctamente.'));
        redirect($this->controlador . "/listas/" . $id_perfil, 'refresh');
    }

}
