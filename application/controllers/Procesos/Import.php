<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends MY_Controller
{
    public $table = 'catag_empresa';

    public $codigo_table = 'Cod_empresa';


    function __construct() {
        parent::__construct();
        $this->load->library('CSVReader');

      
    }



    public function index()
    {
        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }


        $this->titulo = 'Importacion de datos';
        $this->vista = 'process/forms/Import_form_view';
       // $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_acciones','catag_acciones.Estado');
      
        $this->load->view('plantilla/plantilla',$data);
 

    }

    public function Importar()
    {
        // almacena la data
        $data = array();

        $memData = array();

        $subir =$this->input->post('subir');

        if ($subir) {
            
            // Form field validation rules
            $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
            if($this->form_validation->run() == true){

                echo 'subir';

            }else{
                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
            }
        }
        
        redirect('import');
        // If import request is submitted
        
    }


  

// valia que sea un csv
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
}



