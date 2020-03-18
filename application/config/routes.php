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
$route['gestores/eliminar/(:num)'] = 'Administracion/Gestores/destroy/$1';
$route['gestores/editar'] = 'Administracion/Gestores/edit_user/';
$route['gestores/editar/(:num)'] = 'Administracion/Gestores/edit_user/$1';
$route['gestores/actualizar'] = 'Administracion/Gestores/update';
//-----------------------------------------------------------------------------------
$route['acciones'] = 'Administracion/Acciones';


//-----------------------------------------------------------------------------------------
$route['carteras'] = 'Administracion/Carteras';
$route['carteras/nuevo'] = 'Administracion/Carteras/new';
$route['carteras/nuevo_elemento'] = 'Administracion/Carteras/new_element';
// destruir
$route['carteras/eliminar'] = 'Administracion/Carteras/destroy';
$route['carteras/eliminar/(:num)'] = 'Administracion/Carteras/destroy/$1';
//actualizar
$route['carteras/editar/(:num)'] = 'Administracion/Carteras/edit_user/$1';

//-----------------------------------------------------------------------

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
