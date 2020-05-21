<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class parametros extends MY_Controller {


	public function index()
	{
		//$this->js[]='dashboard.js';
        $this->titulo = 'Parametros del sistema';
        
		$parametros = $this->param_model->Get_options();
		
		$logo = $this->param_model->Get_logo();

		$data = array(
			'params'=>$parametros,
			'logo' =>$logo
		);
        
		$this->vista='Generals/Parametros_view';
		$this->load->view($this->plantilla,$data);
	}


	public function Edit($id = null)
	{
		if ($id == null or $this->Administracion_model->validate_existencia_id('id','catag_parametros','id',$id) == null) {
				redirect('/parametros');
		}else{
			$data['old'] = $this->param_model->Get_options_id($id);

			$this->titulo = 'Actualizacion de parametro';
            $this->vista = 'formu/Parametros_edit_view';
            $this->load->view('plantilla/plantilla',$data);
		}
	}


	public function new_element()
	{
		$name =$this->input->post('param');
		
		$des= $this->input->post('des');

		$id =$this->input->post('id');

		$this->form_validation->set_rules('param','Parametro','required|max_length[40]|min_length[4]|regex_match[/^[][a-zA-Z-@# ,().]+$/]');
		$this->form_validation->set_rules('des','des','required|max_length[40]|regex_match[/^[][a-zA-Z-@# ,().]+$/]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		//si entra
	   if ($this->form_validation->run()==true) {
	   
		$data = array(
			'descripcion'=>$des,
			'valor'=>$name
		   );

		 if ($this->input->post('update')) {
			 $this->param_model->Update_options($data,$id);
			 $this->session->set_flashdata('item','Datos Actualizados');
			redirect('parametros');
		 }

	   } else {
		   if ($id) {
			 $this->Edit($id);
		   }
		
	   }
	   
	  

}

}