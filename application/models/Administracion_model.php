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
                // select ctu.id_estado_usuario from catag_usuarios ctu inner join catag_estados ctes on ctes.Cod_estado = ctu.id_estado_usuario where id_usuario
              /*  $this->db->select('id_estado_usuario');
                $this->db->from('catag_usuarios');
                $this->db->join('catag_estados',' catag_usuarios.id_usuario  = catag_estados.Cod_estado');
                $this->db->where('id_usuario', $id);
                $query = $this->db->get();
                */
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




        

}


