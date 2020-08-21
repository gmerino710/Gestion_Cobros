<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Process_model extends CI_Model
{
//select*from bitacora_gestion  order by fecha_de_creacion desc limit 2;
    function __construct() {
        parent::__construct();

        $this->table ='catag_cliente';
        
      
    }

        public function insert($data = array())
        {
            if(!empty($data)){
                // Add created and modified date if not included
              /*  if(!array_key_exists("created", $data)){
                    $data['created'] = date("Y-m-d H:i:s");
                }
                if(!array_key_exists("modified", $data)){
                    $data['modified'] = date("Y-m-d H:i:s");
                }*/
                
                // Insert member data
                $insert = $this->db->insert($this->table, $data);
                
                // Return the status
                return $insert?$this->db->insert_id():false;
            }
            return false;
        }

        public function insert_saldos($table,$data = array())
        {
            if(!empty($data)){
                // Add created and modified date if not included
              /*  if(!array_key_exists("created", $data)){
                    $data['created'] = date("Y-m-d H:i:s");
                }
                if(!array_key_exists("modified", $data)){
                    $data['modified'] = date("Y-m-d H:i:s");
                }*/
                
                // Insert member data
                $insert = $this->db->insert($table, $data);
                
                // Return the status
                return $insert?$this->db->insert_id():false;
            }
            return false;
        }




        public function insert_bitacora($table,$data = array())
        {
            if(!empty($data)){
                // Add created and modified date if not included
              /*  if(!array_key_exists("created", $data)){
                    $data['created'] = date("Y-m-d H:i:s");
                }
                if(!array_key_exists("modified", $data)){
                    $data['modified'] = date("Y-m-d H:i:s");
                }*/
                
                // Insert member data
                $insert = $this->db->insert($table, $data);
                
                // Return the status
                return $insert?$this->db->insert_id():false;
            }
            return false;
        }



        // esta valida que exista

        function getRows($params = array()){
            $this->db->select('*');
            $this->db->from($this->table);
            
            if(array_key_exists("where", $params)){
                foreach($params['where'] as $key => $val){
                    $this->db->where($key, $val);
                }
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                if(array_key_exists("Cod_cliente", $params)){
                    $this->db->where('Cod_cliente', $params['Cod_cliente']);
                    $query = $this->db->get();
                    $result = $query->row_array();
                }else{
                    $this->db->order_by('Cod_cliente', 'desc');
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit'],$params['start']);
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit']);
                    }
                    
                    $query = $this->db->get();
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
                }
            }
            
            // Return fetched data
            return $result;
        }
        function getRows_saldo($params = array()){
            $this->db->select('*');
            $this->db->from($this->table);
            
            if(array_key_exists("where", $params)){
                foreach($params['where'] as $key => $val){
                    $this->db->where($key, $val);
                }
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                if(array_key_exists("No_referecia", $params)){
                    $this->db->where('No_referecia', $params['No_referecia']);
                    $query = $this->db->get();
                    $result = $query->row_array();
                }else{
                    $this->db->order_by('No_referecia', 'desc');
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit'],$params['start']);
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit']);
                    }
                    
                    $query = $this->db->get();
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
                }
            }
            
            // Return fetched data
            return $result;
        }
        function getRows_tb($params = array()){
            $this->db->select('*');
            $this->db->from($this->table);
            
            if(array_key_exists("where", $params)){
                foreach($params['where'] as $key => $val){
                    $this->db->where($key, $val);
                }
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                if(array_key_exists("No_referecia", $params)){
                    $this->db->where('No_referecia', $params['No_referecia']);
                    $query = $this->db->get();
                    $result = $query->row_array();
                }else{
                    $this->db->order_by('No_referecia', 'desc');
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit'],$params['start']);
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit']);
                    }
                    
                    $query = $this->db->get();
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
                }
            }
            
            // Return fetched data
            return $result;
        }
        public function update($data, $condition = array()) {
            if(!empty($data)){
                // Add modified date if not included
            /*    if(!array_key_exists("modified", $data)){
                    $data['modified'] = date("Y-m-d H:i:s");
                }*/
                
                // Update member data
                $update = $this->db->update($this->table, $data, $condition);
                
                // Return the status
                return $update?true:false;
            }
            return false;
        }


        public function update_tb($tb,$data, $condition = array()) {
            if(!empty($data)){
                // Add modified date if not included
            /*    if(!array_key_exists("modified", $data)){
                    $data['modified'] = date("Y-m-d H:i:s");
                }*/
                
                // Update member data
                $update = $this->db->update($tb, $data, $condition);
                
                // Return the status
                return $update?true:false;
            }
            return false;
        }


        public function get_error_data($table,$cantidad,$campo_ordenar ){
          
            $this->db->select('*');
            $this->db->from($table);
            $this->db->order_by($campo_ordenar,'desc');
            $this->db->limit($cantidad);
            $query = $this->db->get();
           
    
            return $query->result_array();


        }



        function get_columns($tb,$params = array(),$id){
            $this->db->select('*');
            $this->db->from($tb);
            
            if(array_key_exists("where", $params)){
                foreach($params['where'] as $key => $val){
                    $this->db->where($key, $val);
                }
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                if(array_key_exists($id, $params)){
                    $this->db->where($id, $params[$id]);
                    $query = $this->db->get();
                    $result = $query->row_array();
                }else{
                    $this->db->order_by($id, 'desc');
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit'],$params['start']);
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                        $this->db->limit($params['limit']);
                    }
                    
                    $query = $this->db->get();
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
                }
            }
            
            // Return fetched data
            return $result;
        }

}