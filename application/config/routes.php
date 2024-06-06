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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Authentication/login';
$route['location'] = 'Authentication/login/locations';
$route['Home'] = 'home/home';
$route['Validate'] = 'Authentication/signup';
$route['Validate-opt'] = 'Authentication/signup/send_otp';
$route['Verify-opt'] = 'Authentication/signup/verify_otp';
$route['New-Signup'] = 'Authentication/signup/new_user';
$route['Booking'] = 'home/home/book';
$route['Logout'] = 'home/home/logout';
$route['Address'] = 'home/home/delivery_page';
$route['Confirm-order'] = 'home/home/add_order_item';

$route['admin'] = 'admin/admin_login';
$route['admin/dashboard'] = 'admin/admin_login/dashboard';
$route['admin/dashboard/new_user'] = 'admin/users/add_user';
$route['admin/dashboard/user_list'] = 'admin/users/lists';
$route['admin/dashboard/locations'] = 'admin/locations/location_add';
$route['admin/dashboard/cafeteria'] = 'admin/cafeteria/cafe_add';
$route['admin/dashboard/meals'] = 'admin/meals/meal_add';
$route['admin/dashboard/menu'] = 'admin/menu';
$route['admin/dashboard/menu_list'] = 'admin/menu/menu_list';
$route['admin/dashboard/orders'] = 'admin/orders/order_add';







