<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administracion_model extends CI_Model
{

    public function obtener_menu()
    {
        $query = $this->db->get('catag_menu');
        
        return $query->result_array();
    }
//select*from catag_gestores inner join catag_estados on catag_gestores.Estado = catag_estados.Cod_estado;

            public function obter_datos_adminitracion($id = null,$campo=null,$data=null,$table=null,$campo_join =null)
            {
                //$data es un array normal
                //$table nombre de la tabla
                // id   
                if ($id==null and $campo==null and $data == null and $table!=null and $campo_join!=null) {

                        $this->db->select('*');
                        $this->db->from($table);
                    
                        //catag_gestores.Estado
                        $this->db->join('catag_estados', $campo_join.'= catag_estados.Cod_estado');
                        $query = $this->db->get();
    
                        return $query->result_array();
                    }else{

                            $this->db->select($data);
                            $this->db->where($campo, $id);
                            $query = $this->db->get($table);
                            
                           return $query->result_array();
                        }
                     
                    
                  
            }

            public function get_estad($id)
            {
            
                $query = $this->db->get_where('catag_usuarios', array('id_usuario' => $id));
               return $query->result_array();

            }


            //

            
            public function get_estado_usuario()
            {
               $query = $this->db->get('catag_estados');
               return $query -> result_array();
            }



            public function get_carteras()
            {
               $query = $this->db->get('catag_carteras');
               return $query -> result_array();
            }

            public function get_carteras_js()
            {
               $query = $this->db->get('catag_carteras');
               return $query -> result_array();
            

            }


            
            public function new_insert($table ,$data)
            {
                $this->db->insert($table,$data);
            }

            public function destroy_element($table,$campo,$id)
            {
                 // eleminar rol
                 $this->db->where($campo, $id);
                 $this->db->delete($table);
        
            }

            public function Update_user($data,$campo,$id,$table)
        {
            $this->db -> set ($data); 
            $this->db-> where ($campo,  $id ); 
            $this->db-> update ( $table);
            
           
        }

////

        // Subactividades

        public function Sub_at()
        {
        
            $query = $this->db->get('viw_sub_actividad');

            return $query->result_array();
        }
        public function Items_actividad()
        {
            $this->db->select('Cod_act,Actividad');
            
            $this->db->from('catag_actividades');
        
            $query = $this->db->get();

            return $query->result_array();
        }

                        // id de busqueda, campo => nombre del campos , tabla , nombre del campo del campo
        public function search_dependencia($table,$id,$campo)
        {
           //$query = $this->db->where($tabla,array($campo=>$id));           
           $this->db->select($campo);
           $this->db->from($table);
           $this->db-> where ($campo,$id );  

          return  $this->db-> count_all_results ();
        }


                       // id de busqueda, campo => nombre del campos , tabla , nombre del campo del campo
                       public function Dependency($table,$id,$campo)
                       {
                          //$query = $this->db->where($tabla,array($campo=>$id));           
                          $this->db->select($campo);
                          $this->db->from($table);
                          $this->db-> where ($campo,$id );  
                          if ($this->db-> count_all_results ()>0) {
                            return  True;
                          }  else{
                              return false;
                          }
                         
                       }



// tabla , campo ,id
        public function search_dependenciax($table,$campo,$id)
        {
           //$query = $this->db->where($tabla,array($campo=>$id));           
           $this->db->select($campo);
           $this->db->from($table);
           $this->db-> where ($campo,$id );  

          return  $this->db-> count_all_results ();
        }

        //campos a retornar , tabla , campo de bsuqueda, idd
        public function validate_existencia_id ($campo,$table,$campo_id,$id)
        {
           //$query = $this->db->where($tabla,array($campo=>$id));           
           $this->db->select($campo);
           $this->db->from($table);
           $this->db-> where ($campo_id,$id );  
           $query = $this->db->get();
           return $query->result_array();
         

        
        }


//obtener los clienes por medio de api


public function get_client($criterio,$id)
{
    $decoficado =rawurldecode($id);
   // $query = $this->db->get_where('catag_cliente', array($criterio => $decoficado));
   $query =$this->db->query("SELECT * FROM catag_cliente WHERE $criterio LIKE '%$decoficado%'");  
   //$query =  $this->db->like();
    if ($query == null) {
        return null;
    } else {
        return $query->result_array();
    }
    
    
}


public function get_client_espc($criterio,$id)
{
    $decoficado =rawurldecode($id);
   // $query = $this->db->get_where('catag_cliente', array($criterio => $decoficado));
   $query =$this->db->query("SELECT * FROM catag_cliente WHERE $criterio = '$decoficado'");  
   //$query =  $this->db->like();
    if ($query == null) {
        return null;
    } else {
        return $query->result_array();
    }
    
    
}

//cebolla , papa y repollo

        
public function get_datas($codigo_cartea)
{
    $query =$this->db->query("SELECT * FROM catag_cliente WHERE Cartera ='$codigo_cartea'");     
    if ($query) {
    return $query -> result_array();
   } else {
    return false;
   }
   

   
}


//trae nombre de los campos
function get_field($table)
{
    $query =$this->db->get($table);

return $query->result_array();

}


function get_simply($table,$id)
{
    $query =$this->db->get_where($table, array('Cod_cliente' => $id));

    return $query->row_array();

}


function get_complete($table,$id,$codigo)
{
    $query =$this->db->get_where($table, array($codigo => $id));

    return $query->result_array();

}


}

