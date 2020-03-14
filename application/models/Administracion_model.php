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

            public function obter_datos_adminitracion()
            {

                    $this->db->select('*');
                    $this->db->from('catag_gestores');
                    $this->db->join('catag_estados', 'catag_gestores.Estado = catag_estados.Cod_estado');
                    $query = $this->db->get();

                    return $query->result_array();
                
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

            public function destroy_element($table,$id)
            {
                 // eleminar rol
                 $this->db->where('Cod_Gestores', $id);
                 $this->db->delete($table);
        
            }
}