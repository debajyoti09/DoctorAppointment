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
|	$route['default_controller'] = 'site';
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

$route['default_controller'] = "main";
$route['set_get_doctor_data/(:any)'] = "set_get_doctor_data/$1";
$route['ctrl_get_fixed_data/(:any)'] = "ctrl_get_fixed_data/$1";
$route['doctor_chamber/ctrl_doctor_chamber/(:any)']="doctor_chamber/ctrl_doctor_chamber/$1";
$route['control_address_city_state_pin/ctrl_control_address_city_state_pin/(:any)']="control_address_city_state_pin/ctrl_control_address_city_state_pin/$1";
$route['(:any)'] = "main/$1";



//$route['login'] = "main/login";
//$route['members'] = "main/members";
//$route['logout'] = "main/logout";
//$route['signup']="main/signup";
//$route['login_validation']="main/login_validation";
//$route['signup_validation']="main/signup_validation";
//$route['register_user']="main/register_user";


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */