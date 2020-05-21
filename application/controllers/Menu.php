<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{
   
   public function __construct()
   {
       parent::__construct();
       $this->titulo                      = 'Opciones de Menu';
       $this->general_model->tabla        = 'catag_menu';
       $this->general_model->id_tabla     = 'id_menu';
       $this->general_model->campo_buscar = 'nombre_menu';

       $this->general_model->agregar_campo('id_menu', 'Codigo Menu', true, 'text', array(), '');
       $this->general_model->agregar_campo('nombre_menu', 'Nombre Menu', true, 'text', array(), 'required');
       $this->general_model->agregar_campo('fa', 'Icono', true, 'text', array(), 'required');
       $this->general_model->agregar_campo('id_padre', 'Menu Padre', false, 'lista', array('id_tabla_relacion' => 'id_menu',
           'tabla'                                                                                                 => 'catag_menu',
           'campo_descripcion'                                                                                     => 'nombre_menu')
           , 'required');

   }

   public function index ()
   {
    $this->titulo     = 'Menus';
    $data['menu'] =$this->Parametros_model->obtener_menu();
    $this->vista = 'Menu/Menu_view';
    $this->load->view('plantilla/plantilla',$data);
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
       $this->vista      = 'Menu/edit';
       $this->load->view($this->plantilla);


      }
}




