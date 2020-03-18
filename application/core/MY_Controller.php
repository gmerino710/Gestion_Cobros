<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $usuario=array();
    public $data=array();
    public $vista="inicio";
    public $tabla;
    public $titulo="Sin titulo";
    public $sub_titulo="Sin sub titulo";
    public $ruta_perfiles="";
    public $js=array();
    public $nombre_empresa='';
    public $abrev_empresa='';
    public $controlador='';
    public $plantilla='plantilla/plantilla';
    public $scripts_pie=array();
    function __construct()
    {
        parent::__construct();
        $this->usuario=obtener_usuario();
        if(!$this->usuario)
        {
        	redirect('inicio');
        }
        $this->ruta_perfiles=$this->param_model->obtener_por_id(4);
        $this->nombre_empresa=$this->param_model->obtener_por_id(1);
        $this->abrev_empresa=$this->param_model->obtener_por_id(3);
        $this->controlador=get_class($this);
        if(!$this->usuario_model->valida_acceso_menu($this->controlador,$this->usuario['id_rol']))
        {
            redirect('sistema/noacceso');
        }
        
    }

}