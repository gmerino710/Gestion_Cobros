<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class parametros extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->titulo='Parametros Generales';
        $this->general_model->tabla='catag_parametros';
        $this->general_model->id_tabla='id';
        $this->general_model->campo_buscar='nombre_parametro';

        $this->general_model->agregar_campo('id','Codigo Parametro',true,'text',array(),'');
        $this->general_model->agregar_campo('nombre_parametro','Nombre del parametro',true,'text',array(),'required');
        $this->general_model->agregar_campo('descripcion','Descripcion del parametro',true,'text',array(),'');
        $this->general_model->agregar_campo('valor','Valor',true,'text',array(),'required');

    }
	public function index()
	{
		//$this->js[]='dashboard.js';
		$this->sub_titulo='Listado';
		$this->scripts_pie[]=array('vista'=>'scripts/tabla','datos'=>array('id_tabla'=>'tabla_datos'));
		$this->data['lista']=$this->general_model->obtener($this->input->post('buscar'));
		
		$this->vista='general/lista';
		$this->load->view($this->plantilla);
	}

	public function nuevo()
	{
		if($this->input->post('guardar'))
		{
			foreach ($this->general_model->campos as $key => $value) {
				if($value['regla'])
				{
					$this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
				}
			}
			if ($this->form_validation->run() == TRUE)
			{
				$post=$this->input->post();
				unset($post['guardar']);
				$this->general_model->guardar($post);
				$this->session->set_flashdata('mensaje', array('tipo'=>'success','mensaje'=>'Datos ingresados correctamente.'));
				redirect($this->controlador,'refresh');
			}else{
				$this->session->set_flashdata('mensaje', array('tipo'=>'danger',
																'mensaje'=>validation_errors('<p class="text-red" >','</p>')));
			}
			
		}
		$this->sub_titulo='Nuevo';
		$this->vista='general/nuevo';
		$this->load->view($this->plantilla);
	}

	public function editar($id=0)
	{

		$this->data['dato']=$this->general_model->obtener_uno($id);
		if(!$this->data['dato'])
		{
			/*$this->session->set_userdata('mensaje', array('tipo'=>'danger',
																'mensaje'=>'El registro no existe'));*/
			redirect($this->controlador,'refresh');
		}

		if($this->input->post('guardar'))
		{
			foreach ($this->general_model->campos as $key => $value) {
				if($value['regla'] && $value['nombre']!='usuario')
				{
					$this->form_validation->set_rules($value['nombre'], $value['mostrar'], $value['regla']);
				}
			}
			if ($this->form_validation->run() == TRUE)
			{
				$post=$this->input->post();
				unset($post['guardar']);
				$this->general_model->actualizar($post,$id);
				$this->session->set_flashdata('mensaje', array('tipo'=>'success','mensaje'=>'Datos actualizados correctamente.'));
				redirect($this->controlador,'refresh');
			}else{
				$this->session->set_flashdata('mensaje', array('tipo'=>'danger',
																'mensaje'=>validation_errors('<p class="text-red" >','</p>')));
			}
			
		}
		$this->sub_titulo='Editar';
		$this->vista='general/editar';
		$this->load->view($this->plantilla);
	}


}
