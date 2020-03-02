<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuario_model extends CI_Model
{

    public function obtener_rol($id_rol)
    {
        return $this->db->get_where('catag_roles', array('id_rol' => $id_rol))->row_array();
    }

    public function obtener_perfil($id_usuario, $codigo_perfil)
    {
        return $this->db->get_where('perfiles', array('codigo_perfil' => $codigo_perfil, 'id_usuario' => $id_usuario))->row_array();
    }

    public function obtener_estado($id_estado)
    {
        return $this->db->get_where('catag_estado_usuarios', array('id_estado_usuario' => $id_estado))->row_array();
    }
    public function registrar_login($usuario, $id_usuario)
    {
        $ip_del_cliente = $this->input->server('HTTP_X_FORWARDED_FOR');

        if (!$ip_del_cliente) {
            $ip_del_cliente = $this->input->ip_address();
        }

        $this->db->insert('log_login', array('usuario' => $usuario,
            'id_usuario'                                   => $id_usuario,
            'fecha_hora'                                   => date("Y-m-d H:i:s"),
            'ip'                                           => $ip_del_cliente,
            'agente'                                       => $this->agent->browser() . ' ' . $this->agent->version() . ' ' . $this->agent->robot() . ' ' . $this->agent->mobile() . ' ' . $this->agent->platform(),
        ));
        $this->db->update('catag_usuarios', array('ultimo_acceso' => date("Y-m-d H:i:s")), array('usuario' => $usuario));
    }

    public function obtener_por_usuario_clave($usuario, $clave)
    {
        $usuario = $this->db->get_where('catag_usuarios', array('usuario' => $usuario))->row_array();
        if ($usuario) {
            if (desencriptar($usuario['clave']) == $clave) {
                return $usuario;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function obtener_por_usuario_clave_empresa($usuario, $clave, $id_usuario)
    {
        $usuario = $this->db->get_where('usuarios_x_usuarios', array('usuario' => $usuario, 'id_usuario' => $id_usuario))->row_array();
        if ($usuario) {
            if (desencriptar($usuario['clave']) == $clave) {
                return $usuario;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function obtiene_menu($id_rol)
    {
        $padres = $this->db->select("b.*")->get_where('catag_menu_rol a, catag_menu b', "a.id_menu = b.id_menu and a.id_rol = " . $id_rol . " and b.id_padre = 0")->result_array();
        foreach ($padres as $key => $value) {
            $hijos                 = $this->db->select("b.*")->get_where('catag_menu_rol a, catag_menu b', "a.id_menu = b.id_menu and a.id_rol = " . $id_rol . " and b.id_padre = " . $value['id_menu'])->result_array();
            $padres[$key]['hijos'] = $hijos;
        }

        return $padres;
    }

    public function obtiene_menu_empresa($id_perfil, $id_usuario)
    {
        $padres = $this->db->select("b.*")->get_where('perfiles_menu a, catag_menu b', "a.id_menu = b.id_menu and a.id_perfil = " . $id_perfil . " and b.id_padre = 0")->result_array();
     
        return $padres;
    }

    public function valida_acceso_menu($url, $id_rol)
    {
        if ($url == 'sistema' || $url == 'perfil') {
            return true;
        }
        $resultado = $this->db->select("b.*")->get_where('catag_menu_rol a, catag_menu b', "a.id_menu = b.id_menu and a.id_rol = " . $id_rol . " and b.url = '" . $url . "'")->result_array();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function obtiene_todo_menu()
    {
        $padres = $this->db->get_where('catag_menu', 'id_menu != 0 and id_padre = 0')->result_array();
        foreach ($padres as $key => $value) {
            $padres[$key]['hijos'] = $this->db->get_where('catag_menu', array('id_padre' => $value['id_menu']))->result_array();

        }
        return $padres;
    }
    public function obtener_menus_x_rol($id_rol)
    {
        return $this->db->get_where('catag_menu_rol', array('id_rol' => $id_rol))->result_array();
    }
    public function actualizar_permisos($id_menus, $id_rol)
    {
        $this->db->delete('catag_menu_rol', array('id_rol' => $id_rol));
        foreach ($id_menus as $key => $value) {
            $this->db->insert('catag_menu_rol', array('id_menu' => $value, 'id_rol' => $id_rol));
        }
    }

    public function actualiza_logo($id, $logo)
    {
        $this->db->update('catag_usuarios', array('logo' => $logo), array('id_usuario' => $id));
    }

    public function actualiza_clave($id, $clave)
    {
        $this->db->update('catag_usuarios', array('clave' => $clave), array('id_usuario' => $id));
    }

    public function obtiene_por_id($id)
    {
        return $this->db->get_where('catag_usuarios', array('id_usuario' => $id))->row_array();
    }

    public function actualizar_permisos_perfiles($id_menus, $id_perfil)
    {
        $this->db->delete('perfiles_menu', array('id_perfil' => $id_perfil,
            'id_usuario'                                         => $this->usuario['id_usuario'],
        )
        );
        foreach ($id_menus as $key => $value) {
            $this->db->insert('perfiles_menu', array('id_menu' => $value, 'id_perfil' => $id_perfil, 'id_usuario' => $this->usuario['id_usuario']));
        }
    }

    public function obtener_menus_x_perfil($id_perfil)
    {
        return $this->db->get_where('perfiles_menu', array('id_perfil' => $id_perfil))->result_array();
    }
    public function insertar_transaccion($datos)
    {
        $this->db->insert('ws_transacciones', $datos);
    }

    public function actualiza_clave_nombre_usuario_emp($id, $clave, $nombre)
    {
        $this->db->update('usuarios_x_usuarios', array(
            'clave'  => $clave,
            'nombre' => $nombre,
        ), array('id_usuario_em' => $id));
    }

    public function obtener_usuario_x_usuario_x_id($id = 0)
    {
        return $this->db->get_where('usuarios_x_usuarios', array('id_usuario_em' => $id))->row_array();
    }

    public function obtener_usuario_x_usuario_x_id_usuario($id = 0)
    {
        return $this->db->get_where('usuarios_x_usuarios', array('id_usuario' => $id))->result_array();
    }

    public function obtener_paises_x_usuario($id_usuario = 0)
    {
        return $this->db->select('b.id_pais, a.nombre nombre_pais, b.id_usuario')
            ->where("a.id = b.id_pais and b.id_usuario = " . $id_usuario)
            ->get('paises a, paises_x_usuario b')
            ->result_array();
    }
    public function agregar_pais($id_usuario = 0, $id_pais = 0)
    {
        $this->db->insert('paises_x_usuario', array('id_usuario' => $id_usuario, 'id_pais' => $id_pais));
    }

    public function eliminar_pais($id_usuario = 0, $id_pais = 0)
    {
        $this->db->delete('paises_x_usuario', array('id_usuario' => $id_usuario, 'id_pais' => $id_pais));
    }

    public function obtener_cantidad_usuarios($id_usuario = 0)
    {
        $this->db->where(array('id_usuario' => $id_usuario))->from('usuarios_x_usuarios');
        return $this->db->count_all_results();
    }

    public function obt_resgitro_x_mes($id_usuario = 0)
    {
        $mes       = date('m');
        $anio      = date('Y');
        $respuesta = $this->db->select('registros')
            ->get_where('masivo_archivo_control',
                array('id_usuario' => $id_usuario,
                    'mes'              => $mes,
                    'anio'             => $anio,
                )
            )->row_array();

        if ($respuesta) {
            return $respuesta['registros'];
        } else {
            return 0;
        }
    }

    public function actualiza_registros_masivos($id_usuario = 0, $cantidad = 0)
    {
        $mes  = date('m');
        $anio = date('Y');
        $dato = $this->db->get_where('masivo_archivo_control',
            array('id_usuario' => $id_usuario,
                'mes'              => $mes,
                'anio'             => $anio,
            )
        )->row_array();

        if ($dato) {
            $this->db->update('masivo_archivo_control',
                array(
                    'registros' => ($dato['registros'] + $cantidad),
                ), array('id' => $dato['id'])
            );
        } else {
            $this->db->insert('masivo_archivo_control',
                array(
                    'id_usuario' => $id_usuario,
                    'mes'        => $mes,
                    'anio'       => $anio,
                    'registros'  => $cantidad,
                )
            );
        }

    }
    public function obt_reg_masivo_x_mes($id_usuario = 0)
    {
        return $this->db->order_by('anio,mes', 'DESC')
            ->get_where('masivo_archivo_control',
                array(
                    'id_usuario' => $id_usuario,
                )
            )->result_array();
    }

    public function obtener_listas_x_usuario($id_usuario = 0)
    {
        return $this->db->select('a.id_lista, a.nombre_lista, b.id_usuario')
            ->where("a.id_lista = b.id_lista_publica and b.id_usuario = " . $id_usuario)
            ->get('listas_publicas a, listas_publicas_x_usuario b')
            ->result_array();
    }

    public function agregar_lista_x_usuario($id_usuario = 0, $id_lista = 0)
    {
        $this->db->insert('listas_publicas_x_usuario', array('id_usuario' => $id_usuario, 'id_lista_publica' => $id_lista));
    }

    public function eliminar_lista_x_usuario($id_usuario = 0, $id_lista = 0)
    {
        $this->db->delete('listas_publicas_x_usuario', array('id_usuario' => $id_usuario, 'id_lista_publica' => $id_lista));
    }

    public function registra_busqueda_individual($id_usuario = 0, $usuario_bus = '')
    {
        $fecha = date('Y-m-d');
        // para el admin
        $mes  = date('m');
        $anio = date('Y');
        $dato = $this->db->get_where('conta_bus_indivi',
            array('id_usuario' => $id_usuario,
                'mes'              => $mes,
                'anio'             => $anio,
            )
        )->row_array();

        if ($dato) {
            $this->db->update('conta_bus_indivi',
                array(
                    'cantidad' => ($dato['cantidad'] + 1),
                ), array('id' => $dato['id'])
            );
        } else {
            $this->db->insert('conta_bus_indivi',
                array(
                    'id_usuario' => $id_usuario,
                    'mes'        => $mes,
                    'anio'       => $anio,
                    'cantidad'   => 1,
                )
            );
        }

// para el usuario
        $dato = $this->db->get_where('conta_bus_indi_x_usuario',
            array('id_usuario' => $id_usuario,
                'fecha'            => $fecha,
                'cod_usuario'      => $usuario_bus,
            )
        )->row_array();

        if ($dato) {
            $this->db->update('conta_bus_indi_x_usuario',
                array(
                    'cantidad' => ($dato['cantidad'] + 1),
                ), array('id' => $dato['id'])
            );
        } else {
            $this->db->insert('conta_bus_indi_x_usuario',
                array(
                    'id_usuario'  => $id_usuario,
                    'fecha'       => $fecha,
                    'cod_usuario' => $usuario_bus,
                    'cantidad'    => 1,
                )
            );
        }

        /*$this->db->insert('conta_bus_indivi',
    array(
    'id_usuario'       => $id_usuario,
    'fecha_busqueda'   => date("Y-m-d H:i:s"),
    'usuario_busqueda' => $usuario_bus,
    )
    );*/

    }

    public function obtener_lista_bus_indi($id_usuario = 0)
    {
        $this->db->where(array('id_usuario' => $id_usuario))->from('conta_bus_indivi')->order_by('anio,mes', 'ASC');
        return $this->db->get()->result_array();
    }

    public function obtiene_ip_permitidas($id_usuario = 0)
    {
        return $this->db->get_where('config_ip_permitidas', array('id_usuario' => $id_usuario))->result_array();
    }

    public function comun($data){
        $this->db->insert('prueba',$data);
        
    }
}
