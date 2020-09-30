<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cobros extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gestiones_model');
    }
    
    public function index()
    {
       // echo base_url('api/criterios');
       $codigo =$this->input->post('filtro_cartera_select');

       if ($codigo!=null) {
     
        $data['filtrado']=  $this->Administracion_model->get_datas($codigo);

        $this->titulo = 'Gestion de cartera';
        $this->vista = 'gestion_cobros/gestion_cartera_view';
    

    
        
        $data['estados'] = $this->Administracion_model->get_field('catag_carteras');
        $data['gestores'] = $this->Administracion_model->get_field('catag_gestores');
        // $data['names_cl'] =$this->Administracion_model->get_field('catag_cliente');

       $this->load->view('plantilla/plantilla',$data);

      // print_r($data['filtrado']);

       } else {
              
        $this->titulo = 'Gestion de cartera';
        $this->vista = 'gestion_cobros/gestion_cartera_view';
    

    
        
        $data['estados'] = $this->Administracion_model->get_field('catag_carteras');
                // $data['names_cl'] =$this->Administracion_model->get_field('catag_cliente');

            $this->load->view('plantilla/plantilla',$data);

       }
       

       
    }


    public function comentario($id = null)
    {
        $tabla = 'catag_cliente';

        
        $campo = 'Cod_cliente';

      //  $campo ='comentario_cuenta';

     if ($id==null or $this->Administracion_model->Dependency($tabla,$id,$campo)<1) {
            redirect('cobros');

        } else {

            $comentario=$this->input->post('comentario');

            if ($comentario != null) {
       
                $data = array('Comentario_cuenta '=>$comentario);

                $this->Administracion_model->Update_user($data,$campo,$id,$tabla);

                $this->titulo = 'Comentario cliente';   
                $this->vista = 'gestion_cobros/comentario_view';
                
        
                $data['id']=$id;
                
                $data['filtrado']=  $this->Administracion_model->get_client_espc('Cod_cliente',$id);
                
                
                
                $this->load->view('plantilla/plantilla',$data);

            } else {


                


                $this->titulo = 'Comentario cliente';   
                $this->vista = 'gestion_cobros/comentario_view';
                
        
                $data['id']=$id;
        
                $this->session->set_flashdata('errr','Porfavor ingrese el comentario del cliente , no se podra modificar');
                $data['filtrado']=  $this->Administracion_model->get_client_espc('Cod_cliente',$id);

                
        
                $this->load->view('plantilla/plantilla',$data);
            }
            
         
        }
        


    }


    

    public function cpromesa($id = null)
    {
        $tabla = 'catag_cliente';

        
        $campo = 'Cod_cliente';

      //  $campo ='comentario_cuenta';

     if ($id==null or $this->Administracion_model->Dependency($tabla,$id,$campo)<1) {
            redirect('cobros');

        } else {
                
            $fecha=$this->input->post('birthday');
            $monto=$this->input->post('monto');
            
           

            if ($fecha != null and $monto != null) {
              //id de inserio
                $id_estado_acuerdo =1;
                            
                $gestor = $this->Administracion_model->get_simply($tabla,$id);
             //-----
                $Gestor = $gestor['Gestor'];

                    //fecha del sistema
                // fecha  comrpacion
                $fecha_comparacion=date('Y-m-d');
                //trasnformamos convertida
                $remplazada = str_replace('/','-',$fecha);
                        
                $fechas = strtotime($remplazada);
                //Le das el formato que necesitas a la fecha
                $newformat = date('Y-m-d',$fechas );

                 if ($newformat >= $fecha_comparacion and is_numeric($monto)) {
                
                   
                        $data = array('Cod_cliente'=>$id,
                                        'id_estado' =>$id_estado_acuerdo,
                                        'Gestor'=>$Gestor,
                                        'Monto_empresa'=>$monto,
                                        'F_pago' =>$newformat,
                                        'creado_por'=>obtener_usuario()['usuario']
                        );

                    $this->Administracion_model->new_insert('detalle_promesa_pago',$data);
            
                     redirect('cobros/crear-promesa/'.$id);


                } else {

                    $this->session->set_flashdata('errr','Datos invalidos');
                    redirect('cobros/crear-promesa/'.$id);
                   
                }
                

            }
            
            else {
               
                    
                $this->titulo = 'Promesa de cliente';   
                $this->vista = 'gestion_cobros/crear_promesa_view';
        
                $data['id']=$id;
        
                $data['filtrado']=  $this->Administracion_model->get_complete('all_promesas',$id,'Cod_cliente');
                // tabla , campo buscado, orderar
                $data['ultimo']=$this->Administracion_model->get_error_desc('all_promesas','Estado','F_ingreso');
        
                $this->load->view('plantilla/plantilla',$data);

                
        
            }
            
         
        }
        


    }

    public function find_gestor_empresa($gestor,$estado)
    {
        
        $gestor_data =$this->Administracion_model->get_especifict_gestion($gestor,$estado);
        if($gestor_data != null and $this->usuario['usuario'] == $gestor){
                
                $this->titulo = 'Promesa de cliente';   
                $this->vista = 'gestion_cobros/especific_promesa_view';
                $data['filtrado']= $gestor_data;
                $data['ultimo']=$this->Administracion_model->get_error_desc('all_promesas','Estado','F_ingreso');

                $this->load->view('plantilla/plantilla',$data);

            

        }else{
            redirect('/');
        }
           
    }


    public function uptpromesa($codigo =null)
    {
        //fecha que ingreso
        $fecha=$this->input->post('birthday');
        // botn
       // $estado= $this->input->post('upt');
        // id
        $id =$this->input->post('id');

        // actualizas la fecha de la promesa
        if ($codigo == null) {
                
            
            
          
                //fecha 
                //fecha del sistema
                        // fecha  comrpacion
                $fecha_comparacion=date('Y-m-d');
                //trasnformamos convertida
                $remplazada = str_replace('/','-',$fecha);
                        
                $fechas = strtotime($remplazada);
                //Le das el formato que necesitas a la fecha
                $newformat = date('Y-m-d',$fechas );

                if ($newformat >= $fecha_comparacion) {
                    $data = array(
                        'id_estado' =>2,    
                        'F_pago' =>$newformat,
                        'creado_por'=>obtener_usuario()['usuario']
                        );


                    $this->Administracion_model->Update_user($data,'Cod_cliente',$id,'detalle_promesa_pago');
                    $this->session->set_flashdata('item','Datos Actualizados');
                    redirect('cobros/crear-promesa/'.$id);
                }
                else{
                    
                    $this->session->set_flashdata('errr','La fecha no puede ser menor a la actual');
                    redirect('cobros/crear-promesa/'.$id);
                }

        }
        // con este actualizas si esta cumplida
        else {

            $data = array(
                                    
                'id_estado' =>2,
                'creado_por'=>obtener_usuario()['usuario']
                );


            $this->Administracion_model->Update_user($data,'Cod_cliente',$codigo,'detalle_promesa_pago');
          $this->session->set_flashdata('item','Promesa completada');
            redirect('cobros/crear-promesa/'.$codigo);
            
        }
        

    }

      
      /*Jrodriguez*/
    /*Acceso a la informacion y crecion de gestiones por cliente*/

    public function operaciones_cliente($codigo_cartera = '', $codigo_cliente = '')
    {

        $data            = array();
        $codigo_cartera  = str_replace('%20', ' ', $codigo_cartera);
        $data['cliente'] = $this->gestiones_model->obtiene_cliente($codigo_cartera, $codigo_cliente);

        if ($data['cliente']) {
            $data['vista_iframe'] = 'informacion_gestiones/informacion_general';

            $data['acciones']    = de_resultado_a_array($this->gestiones_model->obtener_acciones(), 'Cod_accion', 'Accion');
            $data['acciones'][0] = '-- Seleccionar --';

            $data['estatus']    = de_resultado_a_array($this->gestiones_model->obtener_estatus(), 'Cod_act', 'Actividad');
            $data['estatus'][0] = '-- Seleccionar --';

        } else {
            $data['vista_iframe']   = 'informacion_gestiones/no_permitida';
            $data['mensaje_iframe'] = 'Cliente no existe';
        }

        $this->load->view('plantilla/para_iframe', $data, false);
    }

    public function obtener_sub_estatus($id_estatus)
    {
        $html = "";
        if (!empty($id_estatus)) {
            $subestatus = de_resultado_a_array($this->gestiones_model->obtener_sub_estatus($id_estatus), 'Cod_sub', 'Subactividad');
            if ($subestatus) {
                foreach ($subestatus as $key => $value) {
                    $html .= '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                $html = '<option value="0">-- No se encontro datos --</option>';
            }

        } else {
            $html = '<option value="0">-- Seleccionar --</option>';
        }
        echo $html;
    }

    public function procesar_gestion()
    {
        $datos['cod_error'] = 0;
        $datos['error']     = "Gestion Creada correctamente";
        $post               = $this->input->post();
        if ($post) {
            if (!empty($post['id_accion'])) {
                if (!empty($post['observaciones'])) {
                    if (!empty($post['id_estatus'])) {
                        if (!empty($post['id_sub_estatus'])) {
                            $this->gestiones_model->ingresar_gestion(
                                obtener_cod_usuario(),
                                $post['cod_cliente'],
                                $post['cartera'],
                                date("Y-m-d H:i:s"),
                                $post['id_accion'],
                                $post['observaciones'],
                                $post['id_estatus'],
                                $post['id_sub_estatus']
                            );
                        } else {
                            $datos['cod_error'] = 1;
                            $datos['error']     = "Debe seleccionar un Sub Estatus ...";
                        }
                    } else {
                        $datos['cod_error'] = 1;
                        $datos['error']     = "Debe seleccionar un Estatus ...";
                    }

                } else {
                    $datos['cod_error'] = 1;
                    $datos['error']     = "Debe ingresar una observacion ...";
                }
            } else {
                $datos['cod_error'] = 1;
                $datos['error']     = "Debe seleccionar un accion ...";
            }
        } else {
            $datos['cod_error'] = 1;
            $datos['error']     = "No existen datos a procesar";
        }

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200) // Return status
            ->set_output(json_encode($datos));
    }

    public function buscar_gestiones()
    {
        $cadena_html = "";
        $post        = $this->input->post();
        if ($post) {
            $gestiones = $this->gestiones_model->obtener_historial($post['fecha_inicio'], $post['fecha_fin'], $post['cod_cliente'], $post['cartera']);

            if ($gestiones) {
                $cadena_html .= '<table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Acción</th>
                        <th class="text-center">Estatus</th>
                        <th class="text-center">Sub Estatus</th>
                        <th class="text-center">Observaciones</th>
                        <th class="text-center">Usuario</th>
                    </tr>
                </thead>';

                $cadena_html .= '<tbody>';

                foreach ($gestiones as $key => $value) {
                    $cadena_html .= '<tr>
                                        <td class="text-center">' . $value['fecha'] . '</td>
                                        <td class="text-center">' . $value['Accion'] . '</td>
                                        <td class="text-center">' . $value['Actividad'] . '</td>
                                        <td class="text-center">' . $value['Subactividad'] . '</td>
                                        <td class="text-center">' . $value['observaciones'] . '</td>
                                        <td class="text-center">' . $value['usuario_add'] . '</td>
                                    </tr>';

                    //$cadena_html .= $value['observaciones'];
                }
                $cadena_html .= '</tbody>';
                $cadena_html .= '</table>';

            } else {
                $cadena_html = '<p class="text-center">No hay datos para mostrar</p>';
            }

        } else {
            $cadena_html = '<p class="text-center">No hay datos que procesar</p>';
        }
        echo $cadena_html;
    }


}