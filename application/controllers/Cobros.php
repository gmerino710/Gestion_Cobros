<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cobros extends MY_Controller
{
    public function index()
    {
       // echo base_url('api/criterios');
       $codigo =$this->input->post('filtro_cartera_select');

       if ($codigo!=null) {
     
        $data['filtrado']=  $this->Administracion_model->get_datas($codigo);

        $this->titulo = 'Gestion de cartera';
        $this->vista = 'gestion_cobros/gestion_cartera_view';
    

    
        
        $data['estados'] = $this->Administracion_model->get_field('catag_carteras');
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

        if ($newformat >= $fecha_comparacion) {
                
                   
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

                    echo $fecha.'<br>';
                    echo gettype($fecha).'<br>';
                    echo 'fallo la fecha no puede ser menor a la actual'.'<br>';
                   
                }
                

            }
           
            else {
               
                    
                $this->titulo = 'Promesa de cliente';   
                $this->vista = 'gestion_cobros/crear_promesa_view';
        
                $data['id']=$id;
        
                $data['filtrado']=  $this->Administracion_model->get_complete('all_promesas',$id,'Cod_cliente');

        
                $this->load->view('plantilla/plantilla',$data);

                
        
            }
            
         
        }
        


    }



    public function uptpromesa()
    {
        //fecha que ingreso
        $fecha=$this->input->post('birthday');
        // botn
        $estado= $this->input->post('upt');
        // id
        $id =$this->input->post('id');
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
/*
     //-----
        if ($fecha >= $referencia) {
                                //Le pasas el string
                $remplazada = str_replace('/','-',$fecha);
                
                $fechas = strtotime($remplazada);
                //Le das el formato que necesitas a la fecha
                $newformat = date('Y-m-d',$fechas );
        
           
              


        } else {

         
      
           
        }*/
        
        //echo 'datos : '.$id.$estado.$fecha;
        
        
        /*

        $this->form_validation->set_rules('actividad','Actividad','required|max_length[40]|min_length[4]|regex_match[/^([a-zA-Z]|\s)+$/]',
        array( 'regex_match' => 'Debe tener minimo 4 caracteres y contener letras sin caracteres especiales',
    ));
        $this->form_validation->set_rules('estado','Estado','required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        //si entra
       if ($this->form_validation->run()==true) {
       
     


         if ($estado) {
            $data = array(
                'Actividad'=>$name,
                'Estado'=>$estado,
                'modificado_por'=>obtener_usuario()['usuario']
               );

             $this->Administracion_model->Update_user($data,$this->codigo_table,$id,$this->table);
             $this->session->set_flashdata('item','Datos Actualizados');
              redirect('actividades');
         }
         else{

            $data1 = array(
                'Actividad'=>$name,
                'Estado'=>$estado,
                'creado_por'=>obtener_usuario()['usuario']
               );
               
            $this->Administracion_model->new_insert($this->table,$data1);
            $this->session->set_flashdata('item','Elemento Añadido');
            redirect('actividades');
         }


       } else {
           if ($id) {
             $this->edit_user($id);
           }
            $this->new();
       }
       
      */
    }

      
      


}