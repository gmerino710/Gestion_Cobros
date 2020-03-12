<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parametros_model extends CI_Model
{

    public function obtener_menu()
    {
        $query = $this->db->get('catag_menu');
        
        return $query->result_array();
    }

}