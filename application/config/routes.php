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

$route['default_controller'] 		= "cms";
$route['dashboard']			 		= "cms/dashboard";

$route['forgot-password']	 		= "cms/forgot_password";

$route['fabrics']			 		= "cms/fabrics";
$route['fabrics/([0-9]+)']	 		= "cms/fabrics/$1";
$route['fabrics/add']		 		= "cms/add_fabrics";
$route['fabrics/edit/(.*)']			= "cms/edit_fabrics/$1";
$route['fabrics/delete/(.*)']		= "cms/delete_fabrics/$1";

$route['features']			 		= "cms/features";
$route['features/([0-9]+)']	 		= "cms/features/$1";
$route['features/add']		 		= "cms/add_features";
$route['features/edit/(.*)']	 	= "cms/edit_features/$1";
$route['features/delete/(.*)']	 	= "cms/delete_features/$1";

$route['uses']			 			= "cms/uses";
$route['uses/([0-9]+)']	 			= "cms/uses/$1";
$route['uses/add']		 			= "cms/add_uses";
$route['uses/edit/(.*)']	 		= "cms/edit_uses/$1";
$route['uses/delete/(.*)']	 		= "cms/delete_uses/$1";

$route['users']				 		= "cms/users";
$route['users/([0-9]+)']	 		= "cms/users/$1";
$route['users/add']			 		= "cms/add_users";
$route['users/edit/(.*)']	 		= "cms/edit_users/$1";
$route['users/delete/(.*)']	 		= "cms/delete_users/$1";

$route['logout']			 		= "cms/logout";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */