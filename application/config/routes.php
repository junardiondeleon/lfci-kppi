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
| Please see the area guide for complete details:
|
|	https://codeigniter.com/area_guide/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site/login';
// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'site/login';
$route['logout'] = 'site/logout';
$route['dashboard'] = 'dashboard/index';

$route['area/new'] = "area/edit";
$route['area/(:num)/edit'] = "area/edit/$1";
$route['area/(:num)/delete'] = "area/delete/$1";
$route['area/(:any)/view'] = "area/view/$1";
$route['area/page'] = "area/index";
$route['area/page/(:num)'] = "area/index/$1";
$route['areas/page'] = "area/index";
$route['areas/page/(:num)'] = "area/index/$1";
$route['areas'] = "area/index";


$route['user/new'] = "user/edit";
$route['user/(:num)/edit'] = "user/edit/$1";
$route['user/(:num)/reset_password'] = "user/reset_password/$1";
$route['user/(:num)/delete'] = "user/delete/$1";
$route['user/(:any)/view'] = "user/view/$1";
$route['users'] = "user/index";
$route['user/page'] = "user/index";
$route['user/page/(:num)'] = "user/index/$1";
$route['users/page'] = "user/index";
$route['users/page/(:num)'] = "user/index/$1";

$route['member/new'] = "member/edit";
$route['member/(:num)/edit'] = "member/edit/$1";
$route['member/(:num)/delete'] = "member/delete/$1";
$route['member/(:any)/view'] = "member/view/$1";
$route['members'] = "member/index";
$route['member/page'] = "member/index";
$route['member/page/(:num)'] = "member/index/$1";
$route['members/page'] = "member/index";
$route['members/page/(:num)'] = "member/index/$1";

$route['group/new'] = "group/edit";
$route['group/(:num)/edit'] = "group/edit/$1";
$route['group/(:num)/delete'] = "group/delete/$1";
$route['group/(:any)/view'] = "group/view/$1";
$route['group/page'] = "group/index";
$route['group/page/(:num)'] = "group/index/$1";
$route['groups/page'] = "group/index";
$route['groups/page/(:num)'] = "group/index/$1";

$route['groups'] = "group/index";

$route['loan_program/new'] = "loan_program/edit";
$route['loan_program/(:num)/edit'] = "loan_program/edit/$1";
$route['loan_program/(:num)/delete'] = "loan_program/delete/$1";
$route['loan_program/(:any)/view'] = "loan_program/view/$1";
$route['loan_program/page'] = "loan_program/index";
$route['loan_program/page/(:num)'] = "loan_program/index/$1";
$route['loan_programs'] = "loan_program/index";
$route['loan_programs/page'] = "loan_program/index";
$route['loan_programs/page/(:num)'] = "loan_program/index/$1";

$route['loan_term/new'] = "loan_term/edit";
$route['loan_term/(:num)/edit'] = "loan_term/edit/$1";
$route['loan_term/(:num)/delete'] = "loan_term/delete/$1";
$route['loan_term/(:any)/view'] = "loan_term/view/$1";
$route['loan_term/page'] = "loan_term/index";
$route['loan_term/page/(:num)'] = "loan_term/index/$1";
$route['loan_terms/page'] = "loan_term/index";
$route['loan_terms/page/(:num)'] = "loan_term/index/$1";
$route['loan_terms'] = "loan_term/index";

$route['life_insurance/new'] = "life_insurance/edit";
$route['life_insurance/(:num)/edit'] = "life_insurance/edit/$1";
$route['life_insurance/(:num)/delete'] = "life_insurance/delete/$1";
$route['life_insurance/(:any)/view'] = "life_insurance/view/$1";
$route['life_insurance/page'] = "life_insurance/index";
$route['life_insurance/page/(:num)'] = "life_insurance/index/$1";
$route['life_insurances/page'] = "life_insurance/index";
$route['life_insurances/page/(:num)'] = "life_insurance/index/$1";
$route['life_insurances'] = "life_insurance/index";

$route['loan_requirement/new'] = "loan_requirement/edit";
$route['loan_requirement/(:num)/edit'] = "loan_requirement/edit/$1";
$route['loan_requirement/(:num)/delete'] = "loan_requirement/delete/$1";
$route['loan_requirement/(:any)/view'] = "loan_requirement/view/$1";
$route['loan_requirement/page'] = "loan_requirement/index";
$route['loan_requirement/page/(:num)'] = "loan_requirement/index/$1";
$route['loan_requirements/page'] = "loan_requirement/index";
$route['loan_requirements/page/(:num)'] = "loan_requirement/index/$1";
$route['loan_requirements'] = "loan_requirement/index";


$route['loan_collateral/new'] = "loan_collateral/edit";
$route['loan_collateral/(:num)/edit'] = "loan_collateral/edit/$1";
$route['loan_collateral/(:num)/delete'] = "loan_collateral/delete/$1";
$route['loan_collateral/(:any)/view'] = "loan_collateral/view/$1";
$route['loan_collateral/page'] = "loan_collateral/index";
$route['loan_collateral/page/(:num)'] = "loan_collateral/index/$1";
$route['loan_collaterals/page'] = "loan_collateral/index";
$route['loan_collaterals/page/(:num)'] = "loan_collateral/index/$1";
$route['loan_collaterals'] = "loan_collateral/index";

$route['mode_of_payment/new'] = "mode_of_payment/edit";
$route['mode_of_payment/(:num)/edit'] = "mode_of_payment/edit/$1";
$route['mode_of_payment/(:num)/delete'] = "mode_of_payment/delete/$1";
$route['mode_of_payment/(:any)/view'] = "mode_of_payment/view/$1";
$route['mode_of_payment/page'] = "mode_of_payment/index";
$route['mode_of_payment/page/(:num)'] = "mode_of_payment/index/$1";
$route['mode_of_payments/page'] = "mode_of_payment/index";
$route['mode_of_payments/page/(:num)'] = "mode_of_payment/index/$1";
$route['mode_of_payments'] = "mode_of_payment/index";


$route['loan_category/new'] = "loan_category/edit";
$route['loan_category/(:num)/edit'] = "loan_category/edit/$1";
$route['loan_category/(:num)/delete'] = "loan_category/delete/$1";
$route['loan_category/(:any)/view'] = "loan_category/view/$1";
$route['loan_category/page'] = "loan_category/index";
$route['loan_category/page/(:num)'] = "loan_category/index/$1";
$route['loan_categories/page'] = "loan_category/index";
$route['loan_categories/page/(:num)'] = "loan_category/index/$1";
$route['loan_categories'] = "loan_category/index";

$route['accounting_particular/new'] = "accounting_particular/edit";
$route['accounting_particular/(:num)/edit'] = "accounting_particular/edit/$1";
$route['accounting_particular/(:num)/delete'] = "accounting_particular/delete/$1";
$route['accounting_particular/(:any)/view'] = "accounting_particular/view/$1";
$route['accounting_particular/page'] = "accounting_particular/index";
$route['accounting_particular/page/(:num)'] = "accounting_particular/index/$1";
$route['accounting_particulars/page'] = "accounting_particular/index";
$route['accounting_particulars/page/(:num)'] = "accounting_particular/index/$1";
$route['accounting_particulars'] = "accounting_particular/index";

$route['payment_category/new'] = "payment_category/edit";
$route['payment_category/(:num)/edit'] = "payment_category/edit/$1";
$route['payment_category/(:num)/delete'] = "payment_category/delete/$1";
$route['payment_category/(:any)/view'] = "payment_category/view/$1";
$route['payment_category/page'] = "payment_category/index";
$route['payment_category/page/(:num)'] = "payment_category/index/$1";
$route['payment_categories/page'] = "payment_category/index";
$route['payment_categories/page/(:num)'] = "payment_category/index/$1";
$route['payment_categories'] = "payment_category/index";


$route['p3/new'] = "p3/edit";
$route['p3/(:num)/edit'] = "p3/edit/$1";
$route['p3/(:num)/add_comment'] = "p3/add_comment/$1";
$route['p3/(:num)/delete'] = "p3/delete/$1";
$route['p3/(:num)/view'] = "p3/view/$1";
$route['p3/(:num)/confirmation'] = "p3/confirmation/$1";
$route['p3/page'] = "p3/index";
$route['p3/page/(:num)'] = "p3/index/$1";
$route['p3'] = "p3/index";

$route['p3_verification'] = "p3_verification/index";
$route['p3_verification/(:num)/assigned_to_me'] = "p3_verification/assigned_to_me/$1";
$route['p3_verification/(:num)/add_comment'] = "p3_verification/add_comment/$1";
$route['p3_verification/(:num)/returned_to_queue'] = "p3_verification/returned_to_queue/$1";
$route['p3_verification/(:any)/view'] = "p3_verification/view/$1";
$route['p3_verification/(:num)/verification'] = "p3_verification/edit/$1";


$route['view_my_profile'] = "dashboard/view_profile";
$route['reset_password'] = "dashboard/reset_password";