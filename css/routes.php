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
//controlador centro_cultivo
$route['centro']['get']        = 'centro/read';
$route['centro']['get']        = 'centro/concesiones';
$route['centro']['get']        = 'centro/decretos';
$route['centro']['get']        = 'centro/tcentros';
$route['centro']['get']        = 'centro/bodegass';
$route['centro']['get']        = 'centro/estados';
$route['centro']['get']        = 'centro/holdings';
$route['centro']['post']       = 'centro/add';
$route['centro']['put']        = 'centro/update';
$route['centro/(:num)']['delete']  = 'centro/borrar/$1';

//controlador area
$route['area']['get']        = 'area/read';
$route['area']['post']       = 'area/add';
$route['area']['put']        = 'area/update';
$route['area/(:num)']['delete']  = 'area/borrar/$1';

//controlador cuadrante
$route['cuadrante']['get']        = 'cuadrante/read';
$route['cuadrante']['post']       = 'cuadrante/add';
$route['cuadrante']['put']        = 'cuadrante/update';
$route['cuadrante/(:num)']['delete']  = 'cuadrante/borrar/$1';

//controlador linea
$route['linea']['get']        = 'linea/read';
$route['linea']['post']       = 'linea/add';
$route['linea']['put']        = 'linea/update';
$route['linea/(:num)']['delete']  = 'linea/borrar/$1';