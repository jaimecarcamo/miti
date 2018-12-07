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

//controlador area
$route['area']['get']        = 'area/read';
$route['area']['get']        = 'area/estados';
$route['area']['get']        = 'area/tipoareas';
$route['area']['post']       = 'area/add';
$route['area']['put']        = 'area/update';
$route['area/(:num)']['delete']  = 'area/borrar/$1';

//controlador centro_cultivo
$route['centro']['get']        = 'centro/read';
$route['centro']['get']        = 'centro/concesiones'; 
$route['centro']['get']        = 'centro/decretos';
$route['centro']['get']        = 'centro/areas';
$route['centro']['get']        = 'centro/tcentros';
$route['centro']['get']        = 'centro/estados';
$route['centro']['post']       = 'centro/add';
$route['centro']['put']        = 'centro/update';
$route['centro/(:num)']['delete']  = 'centro/borrar/$1';

//controlador cuadrante
$route['cuadrante']['get']        = 'cuadrante/read';
$route['cuadrante']['get']        = 'cuadrante/estados';
$route['cuadrante/(:num)']['get']        = 'cuadrante/stock/$1';
$route['cuadrante']['get']        = 'cuadrante/centros';
$route['cuadrante']['post']       = 'cuadrante/add';
$route['cuadrante']['put']        = 'cuadrante/update';
$route['cuadrante']['put']        = 'cuadrante/update2';
$route['cuadrante/(:num)']['delete']  = 'cuadrante/borrar/$1'; 

//controlador linea
$route['linea']['get']        = 'linea/read';
$route['linea/(:num)']['get']        = 'linea/cuadrantes/$1';
$route['linea/(:num)']['get']        = 'linea/stock/$1';
$route['linea']['get']        = 'linea/estados';
$route['linea']['get']        = 'linea/centros';
$route['linea']['post']       = 'linea/add';
$route['linea']['put']        = 'linea/update';
$route['linea']['put']        = 'linea/update2';
$route['linea/(:num)']['delete']  = 'linea/borrar/$1';

//controlador proyecto
$route['proyecto']['get']        = 'proyecto/read';
$route['proyecto']['post']       = 'proyecto/add';
$route['proyecto']['put']        = 'proyecto/update';
$route['proyecto/(:num)']['delete']  = 'proyecto/borrar/$1';


//controlador bodegas
$route['bodegap']['get']        = 'bodegap/read';
$route['bodegap']['get']        = 'bodegap/centros';
$route['bodegap']['post']       = 'bodegap/add';
$route['bodegap']['put']        = 'bodegap/update';
$route['bodegap/(:num)']['delete']  = 'bodegap/borrar/$1';

//controlador ordens
$route['ordens']['get']        = 'ordens/read';
$route['ordens']['get']        = 'ordens/bodegas';
$route['ordens/(:num)']['get']        = 'ordens/stock/$1';
$route['ordens']['get']        = 'ordens/colectores';
$route['ordens/(:num)']['get']        = 'ordens/colectororden/$1';
$route['ordens']['get']        = 'ordens/tcentros';
$route['ordens']['post']       = 'ordens/add';
$route['ordens']['put']        = 'ordens/update';
$route['ordens/(:num)']['delete']  = 'ordens/borrar/$1';

//controlador colector
$route['colector']['get']        = 'colector/read';
$route['colector']['get']        = 'colector/centros';
$route['colector']['post']       = 'colector/add';
$route['colector']['put']        = 'colector/update';
$route['colector']['put']        = 'colector/update2';
$route['colector/(:num)']['delete']  = 'colector/borrar/$1';


//controlador siembra
$route['siembra']['get']        = 'siembra/read';
$route['siembra']['get']        = 'siembra/proyectos';
$route['siembra']['get']        = 'siembra/ordenes';
$route['siembra']['get']        = 'siembra/centros';
$route['siembra']['get']        = 'siembra/lineas';
$route['siembra/(:num)']['get']        = 'siembra/stock/$1';
$route['siembra/(:num)']['get']        = 'siembra/cuadrantes/$1';
$route['siembra']['get']        = 'siembra/origenes';
$route['siembra']['get']        = 'siembra/bodegas';
$route['siembra']['get']        = 'siembra/tcolector';
$route['siembra']['get']        = 'siembra/peso';
$route['siembra']['get']        = 'siembra/talla';
$route['siembra']['get']        = 'siembra/nrotador';
$route['siembra']['get']        = 'siembra/ncolector';
$route['siembra']['post']       = 'siembra/add';
$route['siembra']['put']        = 'siembra/update';
$route['siembra']['put']        = 'siembra/update2';
$route['siembra/(:num)']['delete']  = 'siembra/borrar/$1';

//controlador cosecha
$route['cosecha']['get']        = 'cosecha/read';
$route['cosecha']['get']        = 'cosecha/proyecto';
$route['cosecha']['get']        = 'cosecha/centros';
$route['cosecha']['get']        = 'cosecha/embarcaciones';
$route['cosecha']['get']        = 'cosecha/personas';
$route['cosecha']['get']        = 'cosecha/lineas';
$route['cosecha']['get']        = 'cosecha/cuadrantes';
$route['cosecha']['get']        = 'cosecha/cuelgas';
$route['cosecha/(:num)']['get']        = 'cosecha/stock/$1';
$route['cosecha/(:num)']['get']        = 'cosecha/patente/$1';
$route['cosecha/(:num)/(:num)']['get']        = 'cosecha/siembras/$1/$2';
$route['cosecha']['post']       = 'cosecha/add';
$route['cosecha']['put']        = 'cosecha/update';
$route['cosecha/(:num)']['delete']  = 'cosecha/borrar/$1';

//controlador muestreo
$route['muestreo']['get']        = 'muestreo/read';
$route['muestreo']['get']        = 'muestreo/personas';
$route['muestreo']['get']        = 'muestreo/embarcaciones';
$route['muestreo']['post']       = 'muestreo/add';
$route['muestreo']['put']        = 'muestreo/update';
$route['muestreo/(:num)']['delete']  = 'muestreo/borrar/$1';

//controlador muestra
$route['muestra']['get']        = 'muestra/read';
$route['muestra/(:num)']['get']        = 'muestra/lineas/$1';
$route['muestra/(:num)']['get']        = 'muestra/cuadrantes/$1';
$route['muestra']['get']        = 'muestra/centros';
$route['muestra']['get']        = 'muestra/muestreos';
$route['muestra']['post']       = 'muestra/add';
$route['muestra']['put']        = 'muestra/update';
$route['muestra/(:num)']['delete']  = 'muestra/borrar/$1';

//controlador biomasa
$route['biomasa/(:num)/(:num)']['get']  = 'biomasa/fecha/$1/$2';
$route['biomasa/(:num)']['get']  = 'biomasa/fecha2/$1';

















