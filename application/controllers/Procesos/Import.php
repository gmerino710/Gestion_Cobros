<?php

use function PHPSTORM_META\type;
 // revisar la idetenacion
 //ver relaciones
//select * FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS WHERE TABLE_SCHEMA="proyecto_vacio" AND CONSTRAINT_TYPE="FOREIGN KEY" 


defined('BASEPATH') or exit('No direct script access allowed');

class Import extends MY_Controller
{
    public $table = 'catag_empresa';

    public $cartera ='catag_carteras';
    public $gestor = 'catag_gestores';
    public $operacion ='catag_operacion';

    public $codigo_table = 'Cod_empresa';
    public $clientes = 'Clientes';
    public $pagos = 'Pagos';
    public $tb_bitacora_clientes = 'bitacora_cliente';
    public $tb_bitacora_colas = 'bitacora_colas_trabajo'; 
    public $tb_bitacora_gestion = 'bitacora_gestion';
    public $tb_bitacora_pagos = 'bitacora_pagos';
    public $direccion = 'php://output';
    public $csv_invalid ='Ingrese un archivo csv';
   //***************************************** */
    // errores name
    public $error_text_pago = 'error_pago';
    public $error_text_cliente = 'error_cliente';
    public $error_text_gestion = 'error_gestion';
    public $error_text_colas = 'error_colas_trabajo';
    // url de error
    public $error_pagos = 'exp_err_pagos/error_pago/ctn/';
    public $error_gestion = 'exp_err_pagos/error_gestion/ctn/';
    public $error_colas = 'exp_err_pagos/error_colas_trabajo/ctn/';
    public $error_cliente = 'exp_err_pagos/error_cliente/ctn/';
    //******************************* */
    public $campo = 'fecha_de_creacion ';
    public $not =0;

    function __construct() {
        parent::__construct();
        $this->load->library('CSVReader');
        $this->load->helper('file');
        $this->load->model('Process_model');
        $this->load->helper('download');
        // crea archivoc csv
        $this->load->dbutil();

        
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

        $data['personas'] = array('alummno'=>'guillermo');

        $this->titulo = 'Importacion de datos';
        $this->vista = 'process/forms/Import_form_view';
       // $data['administracion'] = $this->Administracion_model->obter_datos_adminitracion(null,null,null,'catag_acciones','catag_acciones.Estado');
      
        $this->load->view('plantilla/plantilla',$data);
 

    }
    


    public function Importar()
    {
        // almacena la data
      //  $data = array();

        $memData = array();

        $subir =$this->input->post( array ( 'importSubmit',  'importCol','importPago','importGest'));

        if ($subir['importSubmit']) {
            
            // Form field validation rules
            $this->form_validation->set_rules('file', 'file','callback_file_check');

            if($this->form_validation->run() == true){
             
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                // verifica si esiste 
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // analissis el nombre del csv
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    if(!empty($csvData)){
                       
                        $encabezados = [];
                        foreach ($csvData[1] as $key => $value)
                        {
                            array_push($encabezados,$key);
                        }

                        //print_r($encabezados);
                        $cabezera_csv =['IDCLIENTE','SEXO','FECHA DE NACIMIENTO','NOMBRE','DUI','E-MAIL','CARTERA','GESTOR','DOMICILIO','REFERENCIA OPERACION','SALDO CAPITAL','SALDO INTERES','SALDO VENCIDO','SALDO TOTAL','DIAS MORA','DESCRIPCION DE PRODUCTO','TRABAJO','DIRECCION DE TRABAJO','TEL CASA','TEL TRABAJO','TEL CELULAR','TEL FAMILIAR','NOMBRE FAMILIAR','TEL FIADOR','NOMBRE FIADOR','TEL REF 1','NOMBRE REF 1','TEL REF 2','NOMBRE REF 2','COMENTARIO DE CUENTA','FACTURA','SUCURSAL','ASESOR','DIA ASIGNACION','MES ASIGNACION','AÑO ASIGNACION','MONTO OTORGADO','PLAZO','DIA APERTURA','MES APERTURA','AÑO APERTURA','DIA VENCIMIENTO','MES VENCIMIENTO','AÑO VENCIMIENTO','CUOTA','DIA ULTIMO PAGO','MES ULTIMO PAGO','AÑO ULTIMO PAGO','MONTO ULTIMO PAGO','CUOTAS PAGADAS','GARANTIA','TIPO DE CARTERA','DIA SEPARACION','MES SEPARACION','AÑO SEPARACION','SALARIO CLIENTE'];

                        $comparacion = array_diff($encabezados,$cabezera_csv);

                        if (count($comparacion)==0) 
                        {
                            foreach($csvData as $row )
                            {
                                        $rowCount++;
                                    
                                    
                                            $con = array(
                                                'where' => array(
                                                    'Cod_cliente' => $row['IDCLIENTE']
                                                ),
                                                'returnType' => 'count'
                                            );
                                        $prevCount = $this->Process_model->getRows($con);
                                        if($prevCount > 0)
                                        {
                                        
                                            $memData1 = array(
                                                'Cod_cliente' => $row['IDCLIENTE'],
                                                'Sexo' => $row['SEXO'],
                                                'f_nacimiento' => $row['FECHA DE NACIMIENTO'],
                                                'Nombre_cliente' => $row['NOMBRE'],
                                                'Dui' => $row['DUI'],
                                                'email' => $row['E-MAIL'],
                                                'Cartera' => $row['CARTERA'],
                                                'Gestor' => $row['GESTOR'],
                                                'domicilio' => $row['DOMICILIO'],
                                                'id_operacion' => $row['REFERENCIA OPERACION'],
                                                'saldo_capital' => $row['SALDO CAPITAL'],
                                                'saldo_interes' => $row['SALDO INTERES'],
                                                'saldo_vencido' => $row['SALDO VENCIDO'],
                                                'saldo_total' => $row['SALDO TOTAL'],
                                                'dias_mora' => $row['DIAS MORA'],
                                                'descripcion_producto' => $row['DESCRIPCION DE PRODUCTO'],
                                                'trabajo' => $row['TRABAJO'],
                                                'direccion_trabajo' => $row['DIRECCION DE TRABAJO'],
                                                'tel_casa' => $row['TEL CASA'],
                                                'tel_trabajo' => $row['TEL TRABAJO'],
                                                'tel_celular' => $row['TEL CELULAR'],
                                                'tel_familiar' => $row['TEL FAMILIAR'],
                                                'nombre_familiar' => $row['NOMBRE FAMILIAR'],
                                                'tel_fiador' => $row['TEL FIADOR'], 
                                                'nombre_fiador' => $row['NOMBRE FIADOR'],
                                                'tel_ref1' => $row['TEL REF 1'],
                                                'nombre_ref1' => $row['NOMBRE REF 1'],
                                                'tel_ref2'=> $row['TEL REF 2'], 
                                                'nombre_ref2' => $row['NOMBRE REF 2'],
                                                'Comentario_cuenta' => $row['COMENTARIO DE CUENTA'],
                                                'Factura' => $row['FACTURA'],
                                                'Sucursal' => $row['SUCURSAL'], 
                                                'Asesor' => $row['ASESOR'],
                                                'dia_asignacion' => $row['DIA ASIGNACION'],
                                                'mes_asignacion' => $row['MES ASIGNACION'],
                                                'año_asignacion' => $row['AÑO ASIGNACION'], 
                                                'monto_otorgado' => $row['MONTO OTORGADO'],
                                                'plazo' => $row['PLAZO'],
                                                'dia_apertura' => $row['DIA APERTURA'],
                                                'mes_apertura' => $row['MES APERTURA'], 
                                                'año_apertura' => $row['AÑO APERTURA'],
                                                'dia_vencimiento' => $row['DIA VENCIMIENTO'],
                                                'mes_vencimiento' => $row['MES VENCIMIENTO'], 
                                                'año_vencimiento' => $row['AÑO VENCIMIENTO'],
                                                'cuota' => $row['CUOTA'],
                                                'dia_ultimo_pago' => $row['DIA ULTIMO PAGO'], 
                                                'mes_ultimo_pago' => $row['MES ULTIMO PAGO'],
                                                'año_ultimo_pago' => $row['AÑO ULTIMO PAGO'],
                                                'monto_ultimo_pago' => $row['MONTO ULTIMO PAGO'], 
                                                'cuotas_pagadas' => $row['CUOTAS PAGADAS'],
                                                'garantia' => $row['GARANTIA'],
                                                'tipo_cartera' => $row['TIPO DE CARTERA'],
                                                'dia_separacion' => $row['DIA SEPARACION'],
                                                'mes_separacion' => $row['MES SEPARACION'],
                                                'año_separacion' => $row['AÑO SEPARACION'],
                                                'salario_cliente' => $row['SALARIO CLIENTE'],
                                                'modificado_por' =>obtener_usuario()['usuario']
                                            );
                                                // Update member data
                                                $condition = array('Cod_cliente' => $row['IDCLIENTE']);
                                                if ($this->Administracion_model->Dependency($this->cartera,$row['CARTERA'],'Cod_catera') and
                                        
                                                $this->Administracion_model->Dependency($this->gestor,$row['GESTOR'],'Cod_Gestores') 
                                            
                                            ) {
                                                $update = $this->Process_model->update($memData1, $condition);
                                                if($update){
                                                    $updateCount++;
                                                }
                                            }else{
                                                $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_clientes,$memData1);

                                            }
                                               

                                        
                                     }else{    
                                            $memData1 = array(
                                                'Cod_cliente' => $row['IDCLIENTE'],
                                                'Sexo' => $row['SEXO'],
                                                'f_nacimiento' => $row['FECHA DE NACIMIENTO'],
                                                'Nombre_cliente' => $row['NOMBRE'],
                                                'Dui' => $row['DUI'],
                                                'email' => $row['E-MAIL'],
                                                'Cartera' => $row['CARTERA'],
                                                'Gestor' => $row['GESTOR'],
                                                'domicilio' => $row['DOMICILIO'],
                                                'id_operacion' => $row['REFERENCIA OPERACION'],
                                                'saldo_capital' => $row['SALDO CAPITAL'],
                                                'saldo_interes' => $row['SALDO INTERES'],
                                                'saldo_vencido' => $row['SALDO VENCIDO'],
                                                'saldo_total' => $row['SALDO TOTAL'],
                                                'dias_mora' => $row['DIAS MORA'],
                                                'descripcion_producto' => $row['DESCRIPCION DE PRODUCTO'],
                                                'trabajo' => $row['TRABAJO'],
                                                'direccion_trabajo' => $row['DIRECCION DE TRABAJO'],
                                                'tel_casa' => $row['TEL CASA'],
                                                'tel_trabajo' => $row['TEL TRABAJO'],
                                                'tel_celular' => $row['TEL CELULAR'],
                                                'tel_familiar' => $row['TEL FAMILIAR'],
                                                'nombre_familiar' => $row['NOMBRE FAMILIAR'],
                                                'tel_fiador' => $row['TEL FIADOR'], 
                                                'nombre_fiador' => $row['NOMBRE FIADOR'],
                                                'tel_ref1' => $row['TEL REF 1'],
                                                'nombre_ref1' => $row['NOMBRE REF 1'],
                                                'tel_ref2'=> $row['TEL REF 2'], 
                                                'nombre_ref2' => $row['NOMBRE REF 2'],
                                                'Comentario_cuenta' => $row['COMENTARIO DE CUENTA'],
                                                'Factura' => $row['FACTURA'],
                                                'Sucursal' => $row['SUCURSAL'], 
                                                'Asesor' => $row['ASESOR'],
                                                'dia_asignacion' => $row['DIA ASIGNACION'],
                                                'mes_asignacion' => $row['MES ASIGNACION'],
                                                'año_asignacion' => $row['AÑO ASIGNACION'], 
                                                'monto_otorgado' => $row['MONTO OTORGADO'],
                                                'plazo' => $row['PLAZO'],
                                                'dia_apertura' => $row['DIA APERTURA'],
                                                'mes_apertura' => $row['MES APERTURA'], 
                                                'año_apertura' => $row['AÑO APERTURA'],
                                                'dia_vencimiento' => $row['DIA VENCIMIENTO'],
                                                'mes_vencimiento' => $row['MES VENCIMIENTO'], 
                                                'año_vencimiento' => $row['AÑO VENCIMIENTO'],
                                                'cuota' => $row['CUOTA'],
                                                'dia_ultimo_pago' => $row['DIA ULTIMO PAGO'], 
                                                'mes_ultimo_pago' => $row['MES ULTIMO PAGO'],
                                                'año_ultimo_pago' => $row['AÑO ULTIMO PAGO'],
                                                'monto_ultimo_pago' => $row['MONTO ULTIMO PAGO'], 
                                                'cuotas_pagadas' => $row['CUOTAS PAGADAS'],
                                                'garantia' => $row['GARANTIA'],
                                                'tipo_cartera' => $row['TIPO DE CARTERA'],
                                                'dia_separacion' => $row['DIA SEPARACION'],
                                                'mes_separacion' => $row['MES SEPARACION'],
                                                'año_separacion' => $row['AÑO SEPARACION'],
                                                'salario_cliente' => $row['SALARIO CLIENTE'],
                                                'creado_por' =>obtener_usuario()['usuario']
                                            );  

                                        
                                                if ($this->Administracion_model->Dependency($this->cartera,$row['CARTERA'],'Cod_catera') and
                                                   
                                                    $this->Administracion_model->Dependency($this->gestor,$row['GESTOR'],'Cod_Gestores') 
                                                
                                                ) {
                                                    $insert = $this->Process_model->insert_saldos('catag_cliente',$memData1);
                                                    $insertCount++;
                                                }
                                                else{
                                                    $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_clientes,$memData1);
                                                
                                                }  
                                    }    

                            }
                                   
                                
                    }
                      
                        else{
                                // si hay error en la estructura
                        $this->session->set_userdata('error_msg', 'Error en la estructura.');
                        redirect('import','refresh');
                        }   
                         // Status message with imported data count
                        
                         $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $this->not = $notAddCount;
                         $successMsg = 'Datos del catalogo '. $this->clientes. ' importados correctamente. Total de registros ('.$rowCount.') | Correctos ('.$insertCount.') | Actualizados ('.$updateCount.') | No Insertado ('.$notAddCount.')|'.$retVal = ($notAddCount>0) ? anchor($this->error_cliente.$notAddCount,$title='Ver Errores') : ''.'';
                         $this->session->set_userdata('success_msg',   $successMsg);
                        

                    }

                    else{
                        $this->session->set_userdata('error_msg', 'Archivo vacio');
                    }
                }

            }else{

                $this->session->set_userdata('error_msg',$this->csv_invalid);
            }
            redirect('/import','refresh');
        }
      
    
    elseif($subir['importPago'])
    {
                // Form field validation rules
                $this->form_validation->set_rules('file', 'file','callback_file_check');

                if($this->form_validation->run() == true){ 
                    
                    $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                    if(is_uploaded_file($_FILES['file']['tmp_name']))
                    {
                        //echo 'dssdfsf';
                        $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);         
                                
                        if(!empty($csvData))
                        {
                           

                            $encabezados = [];
                            foreach ($csvData[1] as $key => $value)
                            {
                                array_push($encabezados,$key);
                            }

                            //print_r($encabezados);

                            $cabezera_csv =['ID CLIENTE','ID OPERACION','ABONO','DIA ABONO','MES ABONO','AÑO ABONO','SALDO TOTAL','CARTERA'];

                            $comparacion = array_diff($encabezados,$cabezera_csv);
                             
                                // contas la comparacion
                                if (count($comparacion)==0) 
                                {
                                    foreach ($csvData as $row ) 
                                    {

                                        $rowCount++;
                                    // Prepare data for DB insertion
                                            
                                    // Insert member data

                                        
                                    $memData1 = array(
                                        'id_cliente' =>  $row['ID CLIENTE'],
                                        'id_operacion' => $row['ID OPERACION'],
                                        'abono' => $row['ABONO'],
                                        'abono_dia'=>$row['DIA ABONO'],
                                        'abono_mes' => $row['MES ABONO'],
                                        'abono_año' => $row['AÑO ABONO'],
                                        'saldo_total' => $row['SALDO TOTAL'],
                                        'codigo' => $row['CARTERA'],
                                        'creado_por' =>obtener_usuario()['usuario']
                                    );
                                       if ($this->Administracion_model->Dependency('catag_carteras',$row['CARTERA'],'Cod_catera')) {
                                            $insert = $this->Process_model->insert_saldos('catag_pagos',$memData1);
                                            $insertCount++;
                                        }
                                       
                                        else{
                                            $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_pagos,$memData1);
                                        
                                        } 

                                                    


                                    }

                                }else{
                                    // si hay error en la estructura
                                    $this->session->set_userdata('error_msg', 'Error en la estructura.');
                                    redirect('import','refresh');
                                }
                            
                            $notAddCount = ($rowCount - ($insertCount + $updateCount));
                            $this->not = $notAddCount;
                            $successMsg = 'Datos del catalogo '. 'Pagos'. ' importados correctamente. Total de registros ('.$rowCount.') | Correctos ('.$insertCount.')| No Insertado ('.$notAddCount.')|'.$retVal = ($notAddCount>0) ? anchor($this->error_pagos.$notAddCount,$title='Ver Errores') : ''.'';
                            $this->session->set_userdata('success_msg',   $successMsg);

                        }else{
                            // si el archivo viene bacio
                            $this->session->set_userdata('error_msg', 'Archivo vacio.');
                             redirect('import','refresh');
                        }
                    
                }
                    
            }
            
            else{

                $this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
                redirect('import','refresh');
            }


      redirect('/import','refresh');
    }

        elseif($subir['importGest']){
                 // Form field validation rules
                 $this->form_validation->set_rules('file', 'file','callback_file_check');

                 if($this->form_validation->run() == true){ 
                     
                     $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                     if(is_uploaded_file($_FILES['file']['tmp_name']))
                     {
                         //echo 'dssdfsf';
                         $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);         
                                 
                         if(!empty($csvData))
                         {
                            
 
                             $encabezados = [];
                             foreach ($csvData[1] as $key => $value)
                             {
                                 array_push($encabezados,$key);
                             }
 
                             //print_r($encabezados);
 
                             $cabezera_csv =['IDCLIENTE','OPERACIÓN-REFERENCIA','GESTION','TELEFONO','DIA','MES','AÑO'];
 
                             $comparacion = array_diff($encabezados,$cabezera_csv);
                              
                                 // contas la comparacion
                                 if (count($comparacion)==0) 
                                 {
                                     foreach ($csvData as $row ) 
                                     {
 
                                         $rowCount++;
                                     // Prepare data for DB insertion
                                             
                                     // Insert member data
                                             
                                     // Check whether email already exists in the database
                                     // if (array_key_exists('id_cliente',$row) ) {
                                       /*  $con = array('where' => array(
                                                             'Operacion_ref'=> $row['OPERACIÓN-REFERENCIA']
                                                         ),
                                                         'returnType' => 'count'
                                                     );
                                         $prevCount = $this->Process_model->get_columns('carga_gestion',$con,'Operacion_ref');*/
                                         // va a servir para saber si en las vueltas es mayor que cero e ir actualizando
 
                                               /*  if ($prevCount >0) 
                                                     {
                                                         $memData1 = array(
                                                             'Operacion_ref' => $row['OPERACIÓN-REFERENCIA'],
                                                             'cliente' =>  $row['IDCLIENTE'],
                                                             'Gestion' => $row['GESTION'],
                                                             'Telefono'=>$row['TELEFONO'],
                                                             'dia' => $row['DIA'],
                                                             'mes' => $row['MES'],
                                                             'año' => $row['AÑO'],
                                                        
                                                             'modificado_por' =>obtener_usuario()['usuario']
                                                         );
                                                         //validar que si hay error
                                                         
                                                         // Update member data
 
                                                                 $condition = array('Operacion_ref' => $row['OPERACIÓN-REFERENCIA']);

                                                                 if ($this->Administracion_model->Dependency('catag_cliente',$row['IDCLIENTE'],'Cod_cliente')) {
                                                                   
                                                                    $update = $this->Process_model->update_tb('carga_gestion',$memData1, $condition);        
                                                                    if($update){
                                                                        $updateCount++;
                                                                    }  
                                                                }
                                                               
                                                                else{
                                                                    $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_gestion,$memData1);
                                                                
                                                                } 

                                                         
                                                     }*/
 
                                                     
 
                                                         $memData1 = array(
                                                            'Operacion_ref' => $row['OPERACIÓN-REFERENCIA'],
                                                            'cliente' =>  $row['IDCLIENTE'],
                                                            'Gestion' => $row['GESTION'],
                                                            'Telefono'=>$row['TELEFONO'],
                                                            'dia' => $row['DIA'],
                                                            'mes' => $row['MES'],
                                                            'año' => $row['AÑO'],
                                                            
                                                             'creado_por' =>obtener_usuario()['usuario']
                                                         );
                                                            if ($this->Administracion_model->Dependency('catag_cliente',$row['IDCLIENTE'],'Cod_cliente')) {
                                                                 $insert = $this->Process_model->insert_saldos('carga_gestion',$memData1);
                                                                 $insertCount++;
                                                             }
                                                            
                                                             else{
                                                                 $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_gestion,$memData1);
                                                             
                                                             } 
 
 
                                                     
 
 
                                     }
 
                                 }else{
                                     // si hay error en la estructura
                                     $this->session->set_userdata('error_msg', 'Error en la estructura.');
                                     redirect('import','refresh');
                                 }
                             
                             $notAddCount = ($rowCount - ($insertCount + $updateCount));
                             $this->not = $notAddCount;
                             $successMsg = 'Datos del catalogo '. 'Gestion'. ' importados correctamente. Total de registros ('.$rowCount.') | Correctos ('.$insertCount.')  | No Insertado ('.$notAddCount.')|'.$retVal = ($notAddCount>0) ? anchor($this->error_gestion.$notAddCount
                             ,$title='Ver Errores') : ''.'';
                             $this->session->set_userdata('success_msg',   $successMsg);
 
                         }else{
                             // si el archivo viene bacio
                             $this->session->set_userdata('error_msg', 'Archivo vacio.');
                              redirect('import','refresh');
                         }
                     
                 }
                     
             }
             
             else{
 
                 $this->session->set_userdata('error_msg', 'Selecciona una archivo CSV.');
                 redirect('import','refresh');
             }
 
 
       redirect('/import','refresh');

            

        }

        elseif($subir['importCol'])
        {
            // Form field validation rules
            $this->form_validation->set_rules('file', 'file','callback_file_check');

            if($this->form_validation->run() == true){ 
                
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                if(is_uploaded_file($_FILES['file']['tmp_name']))
                {
                    //echo 'dssdfsf';
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);         
                            
                    if(!empty($csvData))
                    {
                       

                        $encabezados = [];
                        foreach ($csvData[1] as $key => $value)
                        {
                            array_push($encabezados,$key);
                        }

                        //print_r($encabezados);

                        $cabezera_csv =['ID CLIENTE','CARTERA','AÑO ALARMA','MES ALARMA','DIA ALARMA','HORA','COMENTARIO','USUARIO'];

                        $comparacion = array_diff($encabezados,$cabezera_csv);
                         
                            // contas la comparacion
                            if (count($comparacion)==0) 
                            {
                                foreach ($csvData as $row ) 
                                {

                                    $rowCount++;
                                // Prepare data for DB insertion
                                        
                                // Insert member data
                                        
                                // Check whether email already exists in the database
                                // if (array_key_exists('id_cliente',$row) ) {
                                   
                                   // $prevCount = $this->Process_model->get_columns('catag_colas_trabajo',$con,'Id');
                                    // va a servir para saber si en las vueltas es mayor que cero e ir actualizan

                                                    $memData1 = array(
                            
                                                        'cliente' =>  $row['ID CLIENTE'],
                                                        'Cartera' => $row['CARTERA'],
                                                        'año_alarma' => $row['AÑO ALARMA'],
                                                        'mes_alarma' => $row['MES ALARMA'],
                                                        'dia_alarma' => $row['DIA ALARMA'],
                                                        'hora' => $row['HORA'],
                                                        'Usuario' => $row['USUARIO'],
                                                        'Comentario' => $row['COMENTARIO'],
                                                        'creado_por' =>obtener_usuario()['usuario']
                                                    );
                                                       if ($this->Administracion_model->Dependency('catag_cliente',$row['ID CLIENTE'],'Cod_cliente') 
                                                       and
                                                       $this->Administracion_model->Dependency('catag_carteras',$row['CARTERA'],'Cod_catera')
                                                       and
                                                       $this->Administracion_model->Dependency('catag_usuarios',$row['USUARIO'],'usuario')
                                                       ) {
                                                            $insert = $this->Process_model->insert_saldos('catag_colas_trabajo',$memData1);
                                                            $insertCount++;
                                                        }
                                                       
                                                        else{
                                                            $insert = $this->Process_model->insert_bitacora($this->tb_bitacora_colas,$memData1);
                                                        
                                                        } 


                                                


                                }

                            }else{
                                // si hay error en la estructura
                                $this->session->set_userdata('error_msg', 'Error en la estructura.');
                                redirect('import','refresh');
                            }
                        
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $this->not = $notAddCount;
                        $successMsg = 'Datos del catalogo '. 'Gestion'. ' importados correctamente. Total de registros ('.$rowCount.') | Correctos ('.$insertCount.')  | No Insertado ('.$notAddCount.')|'.$retVal = ($notAddCount>0) ? anchor($this->error_colas.$notAddCount
                        ,$title='Ver Errores') : ''.'';
                        $this->session->set_userdata('success_msg',   $successMsg);

                    }else{
                        // si el archivo viene bacio
                        $this->session->set_userdata('error_msg', 'Archivo vacio.');
                         redirect('import','refresh');
                    }
                
            }
                
        }
        
        else{

            $this->session->set_userdata('error_msg', 'Selecciona una archivo CSV.');
            redirect('import','refresh');
        }

         redirect('/import','refresh');

   }
        
   else{
       $this->session->set_userdata('error_msg', 'Opcion invalida.');
       redirect('import','refresh');

    }



}
        

        
        // valia que sea un csv
        public function file_check($str){
            $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
                $mime = get_mime_by_extension($_FILES['file']['name']);
                $fileAr = explode('.', $_FILES['file']['name']);
                $ext = end($fileAr);
                if(($ext == 'csv' ) && in_array($mime, $allowed_mime_types)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                    return false;
                }
            }else{
                return false;
            }
        }

        #funcion para saber vacio

        public function validate_empty(array $data)
        {
            for ($i=0; $i <count($data)-1; $i++) { 
                if ($data[$i]==="" || !isset($data[$i])) {
                    return true;
                }
               return false;
                # code...
            }
           


        }

       public function Exp($name)
        {
        
        print($name);
        
        }
    
 
       // Export data in CSV format 
       public function Exportar(){ 
        // file name 
                $filename = 'Error_import_cliente'.date('Y-m-d').'.csv'; 
                header("Content-Description: File Transfer"); 
                header("Content-Disposition: attachment; filename=$filename"); 
                header("Content-Type: application/csv; ");
                
                // get data 
                $usersData = $this->Process_model->get_error_data($this->tb_bitacora,$this->not,$this->campo);  
            
                
                // file creation t
                $file = fopen($this->direccion, 'w');
            
                $header = array("Cod_cliente","Cod_empresa","Nombre_cliente","tl1","tl2","tl3","Direccion_domicilio","fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por"); 
                fputcsv($file, $header);
                foreach ($usersData as $key=>$line){ 
                fputcsv($file,$line); 
                }
                fclose($file); 
                exit; 
                redirect('/import','refresh');
       }


              // Export data in CSV format 
              public function Exp_pagos($name,$not){ 
                // file name 
                        $filename = $name.date('Y-m-d').'.csv'; 
                        header("Content-Description: File Transfer"); 
                        header("Content-Disposition: attachment; filename=$filename"); 
                        header("Content-Type: application/csv; ");
                        

                        if ($name == $this->error_text_cliente) {
                             // get data 
                        $usersData = $this->Process_model->get_error_data($this->tb_bitacora_clientes,$not,$this->campo);  
                    
                        
                        // file creation t
                        $file = fopen($this->direccion, 'w');


                        
                    
                        $header = array('IDCLIENTE','SEXO','FECHA DE NACIMIENTO','NOMBRE','DUI','E-MAIL','CARTERA','GESTOR','DOMICILIO','REFERENCIA OPERACION','SALDO CAPITAL',
                        'SALDO INTERES','SALDO VENCIDO','SALDO TOTAL','DIAS MORA','DESCRIPCION DE PRODUCTO','TRABAJO','DIRECCION DE TRABAJO','TEL CASA','TEL TRABAJO','TEL CELULAR','TEL FAMILIAR','NOMBRE FAMILIAR'
                        ,'TEL FIADOR','NOMBRE FIADOR','TEL REF 1','NOMBRE REF 1','TEL REF 2','NOMBRE REF 2','COMENTARIO DE CUENTA','FACTURA','SUCURSAL','ASESOR,DIA ASIGNACION','MES ASIGNACION','AÑO ASIGNACION','MONTO OTORGADO','PLAZO','DIA APERTURA','MES APERTURA','AÑO APERTURA','DIA VENCIMIENTO','MES VENCIMIENTO','AÑO VENCIMIENTO','CUOTA','DIA ULTIMO PAGO','MES ULTIMO PAGO','AÑO ULTIMO PAGO','MONTO ULTIMO PAGO','CUOTAS PAGADAS',
                        'GARANTIA','TIPO DE CARTERA','DIA SEPARACION','MES SEPARACION','AÑO SEPARACION','SALARIO CLIENTE',"fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por"); 
                        fputcsv($file, $header);
                        foreach ($usersData as $key=>$line){ 
                        fputcsv($file,$line); 
                        }
                        fclose($file); 
                        exit; 
                        redirect('/import','refresh');
                        }

                        if($name==$this->error_text_gestion){
                                     // get data 
                                $usersData = $this->Process_model->get_error_data($this->tb_bitacora_gestion,$not,$this->campo);  
                            
                                
                                // file creation t
                                $file = fopen($this->direccion, 'w');
                            
                                $header = array('OPERACIÓN-REFERENCIA','IDCLIENTE','GESTION','TELEFONO','DIA','MES','AÑO',"fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por"); 
                                fputcsv($file, $header);
                                foreach ($usersData as $key=>$line){ 
                                fputcsv($file,$line); 
                                }
                                fclose($file); 
                                exit; 
                                redirect('/import','refresh');
                        }

                        if($name==$this->error_text_colas)
                        {
                            // get data 
                            $usersData = $this->Process_model->get_error_data($this->tb_bitacora_colas,$not,$this->campo);  
                        
                            
                            // file creation t
                            $file = fopen($this->direccion, 'w');
                        
                            $header = array('ID CLIENTE','CARTERA','AÑO ALARMA','MES ALARMA','DIA ALARMA','HORA','COMENTARIO','USUARIO',"fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por"); 
                            fputcsv($file, $header);
                            foreach ($usersData as $key=>$line){ 
                            fputcsv($file,$line); 
                            }
                            fclose($file); 
                            exit; 
                            redirect('/import','refresh');
                        }

                        if ($name == $this->error_text_pago) {
                            // get data 
                       $usersData = $this->Process_model->get_error_data($this->tb_bitacora_pagos,$not,$this->campo);  
                   
                       
                       // file creation t
                       $file = fopen($this->direccion, 'w');
                   
                       $header = array("ID CLIENTE","ID OPERACION","ABONO","DIA ABONO","MES ABONO","AÑO ABONO","SALDO TOTAL","CARTERA","fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por"); 
                       fputcsv($file, $header);
                       foreach ($usersData as $key=>$line){ 
                       fputcsv($file,$line); 
                       }
                       fclose($file); 
                       exit; 
                       redirect('/import','refresh');
                       }
                        // get data 
                      /*  $usersData = $this->Process_model->get_error_data($this->tb_bitacora_pagos,$this->not,$this->campo);  
                    
                        
                        // file creation t
                        $file = fopen($this->direccion, 'w');
                    
                        $header = array("fecha_de_creacion","creado_por","fecha_de_modificacion","modificado_por","ID CLIENTE","ID OPERACION","ABONO","DIA ABONO","MES ABONO","AÑO ABONO","SALDO TOTAL","CARTERA"); 
                        fputcsv($file, $header);
                        foreach ($usersData as $key=>$line){ 
                        fputcsv($file,$line); 
                        }
                        fclose($file); 
                        exit; 
                        redirect('/import','refresh');
                        */
               }

}



 
