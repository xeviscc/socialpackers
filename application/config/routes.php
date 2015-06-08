<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$default_controller = "webpages";
//$controller_exceptions = array('admin','forums');
/*$route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $default_controller.'/$1';*/

$default_controller = "landing/view";
//$route['newsletters/(:any)'] = 'newsletters/view/$1';
//route example: http://domain.tld/en/controller => http://domain.tld/controller
$route['default_controller'] = $default_controller;
$route['404_override'] = 'not_found';
//$route['(\w{2})/(.+)'] = '$1';
//$route['(\w{2})'] = $route['default_controller'];


$route['^en/(.+)$'] = "$1"; 
$route['^en$'] = $route['default_controller'];
$route['^es/(.+)$'] = "$1"; 
$route['^es$'] = $route['default_controller'];
$route['^ca/(.+)$'] = "$1"; 
$route['^ca$'] = $route['default_controller'];
$route['^fr/(.+)$'] = "$1"; 
$route['^fr$'] = $route['default_controller'];

$route['^ajax/(.+)$'] = "$1"; 
$route['^ajax$'] = $route['default_controller'];

/*
		"register",
    "changelang",
    "logout",
    "blog",
    "forgot-password",
    "ajax"
*/
//SPECIAL
$route['logout'] = 'login/logout';
$route['forgot_password'] = 'login/forgot_password';

/*    
$route['landing'] = 'landing';
//$route['landing/send'] = 'landing/send';
//$route['blog'] = 'blog';
$route['about'] = 'about';
$route['contact'] = 'contact';
$route['login'] = 'login';
$route['project'] = 'project';
$route['roadmap'] = 'roadmap';

$route['tips'] = 'tips';
$route['profile'] = 'profile';
$route['search'] = 'search';
//$route['project/{:any}'] = 'project/index/$1';
//$route['common/(:any)'] = 'common/view/$1';
$route['action'] = 'action';

$route['waypoint'] = 'waypoint';
//$route['register/(:any)'] = 'register/view/$1';
//$route['(:any)'] = 'pages/view/$1';
*/           



/* End of file routes.php */
/* Location: ./application/config/routes.php */
