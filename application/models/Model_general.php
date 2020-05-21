<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_general extends CI_Model{


    public function get_menu ()
    {
        $query = $this->db->get('catag_menu');

       return $query->result_array();
    }



    public function get_rol ($id=null)
    {
        if($id!=null){
            if (isset($id)) {
                // obtenes el valor de la bysqyedad
             $this->db->select('nombre_rol');
             $this->db->where('id_rol', $id);
             $query = $this->db->get('catag_roles');
             
            return $query->result_array();
             } else {
                 echo 'dato no allado';
             }  
        }else{

            $query = $this->db->get('catag_roles ');
            return $query -> result_array();
        }

        
      
        
    }
 
    public function insert_rol_menu ($id_rol,$id_menu)
    {

                // eleminar rol
        $this->db->where('id_rol', $id_rol);
         $this->db->delete('catag_menu_rol');

        $query="insert into catag_menu_rol (id_rol,id_menu) values($id_rol,$id_menu)";

        $this->db->query($query);

        /*foreach ($id_menu as $key =>) {

            
            
            
            $this->db->query($query);# code...
        }*/
       
    }


    public function get_rol_menu ($id_rol)
    {

                // eleminar rol
        $this->db->where('id_rol', $id_rol);
        $query = $this->db->get('catag_roles ');
        return $query -> result_array();


       
    }

    public function insert_rol ($data)
    {
        $this->db->insert('catag_roles',$data);
    }



    public function get_roles($id=null)
    {
        if ($id!=null) {
            $this->db->select('id_rol');
            $this->db->where('id_rol', $id);
            $query = $this->db->get('catag_roles');
            
           return $query->result_array();
        } else {
            $query = $this->db->get('catag_roles');

            return $query->result_array();
        }
        
    }

    public function destroy_rol($id)
    {
         // eleminar rol
         $this->db->where('id_usuario', $id);
         $this->db->delete('catag_usuarios');

    }

//--------------------------obtener usuarios-----------------------------

    public function Get_usuarios()
    {
       $query = $this->db->get('catag_perfil ');
       return $query -> result_array();
    }

  

    public function Get_estado_usuario()
    {
       $query = $this->db->get('catag_estado_usuarios');
       return $query -> result_array();
    }

    public function Insert_user ($data)
    {
            $this->db->insert('catag_usuarios',$data);
       
       
    }
//-------------------------------Estado----------------------------------------------------

public function Get_user_state($id)
{
   
    $query = $this->db->
    query('select eu.nombre_estado as eme from catag_usuarios usr 
    inner join catag_estado_usuarios eu on eu.id_estado_usuario = usr.id_estado_usuario where usr.id_usuario='.$id);
    return $query->result_array();
}

public function Get_user_id($id)
{
            $this->db->select('id_usuario,usuario,nombre,id_estado_usuario,id_rol');
            $this->db->where('id_usuario', $id);
            $query = $this->db->get('catag_usuarios');
            
           return $query->result_array();
}

public function Update_user ($data,$id)
{
    $this->db -> set ($data); 
    $this->db-> where ('id_usuario', $id); 
    $this->db-> update ( 'catag_usuarios' );
}


//---------------------------------Eliminar Elementos de y acutalizar------------------------------------------------------------------------------

public function destroy_create_permisso ($id)
{

    $this->db->where($id);

}



}