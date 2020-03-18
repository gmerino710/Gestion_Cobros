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


            public function get_estado_usuario()
            {
               $query = $this->db->get('catag_estados');
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

}