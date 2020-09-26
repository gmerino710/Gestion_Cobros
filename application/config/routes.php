<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'inicio';
// ------------------------------------------------------
$route['roles']='Roles';
$route['roles/permissions/(:num)'] = 'Roles/permissions/$1';
$route['roles/permiso'] = 'Roles/Set_permissions/';
$route['Register'] = 'Roles/Register';
// destruir
$route['roles/eliminar'] = 'Roles/destroy';
$route['roles/eliminar/(:num)'] = 'Roles/destroy/$1';
//--------------------Uusarios-----------------------------------------
$route['usuarios'] = 'Usuarios';
$route['usuarios/nuevo'] = 'Usuarios/Set_users';
$route['usuarios/registrar'] = 'Usuarios/Register';
$route['usuarios/delete/(:num)'] = 'Usuarios/delete/$1';
$route['usuarios/user_edit/(:num)'] = 'Usuarios/edit_user/$1';
$route['usuarios/actualizar'] = 'Usuarios/update';
//---------------------------Admin--------------------------------------------------

$route['gestores'] = 'Administracion/Gestores';
$route['gestores/nuevo'] = 'Administracion/Gestores/new';
$route['gestores/nuevo_elemento'] = 'Administracion/Gestores/new_element';
$route['gestores/eliminar/(:any)'] = 'Administracion/Gestores/destroy/$1';
$route['gestores/editar'] = 'Administracion/Gestores/edit_user/';
$route['gestores/editar/(:num)'] = 'Administracion/Gestores/edit_user/$1';
$route['gestores/actualizar'] = 'Administracion/Gestores/update';
//---------------------------Acciones--------------------------------------------------------
$route['acciones'] = 'Administracion/Acciones';
$route['acciones/nuevo'] = 'Administracion/Acciones/new';
$route['acciones/nuevo_elemento'] = 'Administracion/Acciones/new_element';
// destruir
$route['acciones/eliminar'] = 'Administracion/Acciones/destroy';
$route['acciones/eliminar/(:num)'] = 'Administracion/Acciones/destroy/$1';
//actualizar
$route['acciones/editar/(:num)'] = 'Administracion/Acciones/edit_user/$1';
$route['acciones/editar'] = 'Administracion/Acciones/edit_user/';

//-----------------------------------------------------------------------------------------
$route['carteras'] = 'Administracion/Carteras';
$route['carteras/nuevo'] = 'Administracion/Carteras/new';
$route['carteras/nuevo_elemento'] = 'Administracion/Carteras/new_element';
// destruir
$route['carteras/eliminar'] = 'Administracion/Carteras/destroy';
$route['carteras/eliminar/(:any)'] = 'Administracion/Carteras/destroy/$1';
//actualizar
$route['carteras/editar/(:any)'] = 'Administracion/Carteras/edit_user/$1';
$route['carteras/editar'] = 'Administracion/Carteras/edit_user/';

//----------------------------------Actividades----------------------------------------------
$route['actividades'] = 'Administracion/Actividades';
$route['actividades/nuevo'] = 'Administracion/Actividades/new';
$route['actividades/nuevo_elemento'] = 'Administracion/Actividades/new_element';
//actualizar
$route['actividades/editar/(:num)'] = 'Administracion/Actividades/edit_user/$1';
$route['actividades/editar'] = 'Administracion/actividades/edit_user/';
//destruir
$route['actividades/eliminar'] = 'Administracion/actividades/destroy';
$route['actividades/eliminar/(:num)'] = 'Administracion/actividades/destroy/$1';
//----------------------------------Sub actividades------------------------------------------------------------

$route['actividades/subactividad/nuevo'] = 'Administracion/Actividades/new_sub';
$route['actividades/subactividad'] = 'Administracion/Actividades/sub';
// crear
$route['actividades/subactividad/nuevo_elemento'] = 'Administracion/Actividades/new_element_sub';
// borrar
$route['actividades/subactividad/eliminar/(:num)'] = 'Administracion/Actividades/destroy_sub/$1';

$route['actividades/subactividad/eliminar'] = 'Administracion/Actividades/destroy_sub';

//------------------------------------------Rutas de cosas generales------------------------------------------------------------------
$route['parametros']='parametros';

$route['parametros/editar/(:num)']='parametros/Edit/$1';
$route['parametros/nuevo'] = 'parametros/new_element';

//--------------------------------Edit menu-------------------------------------------------------------------
$route['Menu/editar/(:num)'] = 'Menu/editar/$1';


$route['logo-empresa'] = 'Perfil/Logo_empresa';


//---------------------------------------Ruta de usuarios-----------------------------------------------------

$route['perfil'] = 'Perfil';

$route['perfil/subirt']='Perfil/subir';
///-----------------------------------------------------------------------------------------------------------
$route['Promesas'] ='Administracion/Promesas';
$route['Promesas/nuevo'] = 'Administracion/Promesas/new';
$route['Promesas/nuevo_elemento'] = 'Administracion/Promesas/new_element';
//borrar
$route['Promesas/eliminar'] = 'Administracion/Promesas/destroy';
$route['Promesas/eliminar/(:num)'] = 'Administracion/Promesas/destroy/$1';
// editar
$route['Promesas/editar/(:num)'] = 'Administracion/Promesas/edit/$1';
//-----------------------------------Ruta empresa-----------------------------------------------------------------------
$route['Empresa'] ='Procesos/Empresa';

$route['Empresa/nuevo'] = 'Procesos/Empresa/new';


$route['Empresa/nuevo_elemento'] = 'Procesos/Empresa/new_element';

//borrar
$route['Empresa/eliminar'] = 'Procesos/Empresa/destroy';
$route['Empresa/eliminar/(:num)'] = 'Procesos/Empresa/destroy/$1';

// editar
$route['Empresa/editar/(:num)'] = 'Procesos/Empresa/edit/$1';

//---------------------------------------------------------------------------------------------------------------------
//IMPORTACION 

$route['import'] ='Procesos/Import';

$route['import/subir'] ='Procesos/Import/Importar';

// importar saldos

$route['import/subir_sl'] ='Procesos/Import/Importar';

$route['exportar_err'] = 'Procesos/Import/Exportar';

//pagos

$route['exp_err_pagos/(:any)/ctn/(:num)'] = 'Procesos/Import/Exp_pagos/$1/$2';


//$route['exp/(:any)'] = 'Procesos/Import/Exp/$1';

// procesos de carteras
//APIS
$route['distribucion'] ='Procesos/Distribucion';
//$route['distribucion/api/carteras'] ='Procesos/Process_api/index_get';
//obtener los usuarios de forma dinamica como es el index
$route['criterios/cliente/(:any)/(:any)'] ='Procesos/Process_api/$1/$2';

$route['criterios/cliente/(:any)'] ='Procesos/Process_api/$1/';

//$route['criterios'] ='Procesos/Process_api/index_get';

//$route['import/error']='Procesos/Import/generate_err';
//---------------------------BUSQUEDAD--------------------------------------------------
$route["busqueda"] ='Busqueda';



// gestion-de-cartera
$route["cobros"] ="Cobros";
$route["cobros/comentario/(:num)"] ="Cobros/comentario/$1";
$route["cobros/crear-promesa/(:num)"] ="Cobros/cpromesa/$1";
$route["cobros/crear-promesa"] ="Cobros/cpromesa/";
$route["cobros/crear-promesa-upt"] ="Cobros/uptpromesa";
//$route["cobros/urls"] ="Cobros/urls";
//---------------------------------------------------------------------------------------------------------
$route['404_override'] = 'Errors404';
$route['translate_uri_dashes'] = FALSE;
