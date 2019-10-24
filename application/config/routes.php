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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['publish'] = 'Dashboard/publish';

$route['packages/packages/add'] = 'Wordingpackages/create';
$route['packages/packages/update/(:any)'] = 'Wordingpackages/update';

$route['packages/list_group'] = 'listgroup/index';
$route['packages/list_group/edit/(:any)/(:any)'] = 'listgroup/edit';
$route['packages/list_group/update/(:any)/(:any)'] = 'listgroup/update';

$route['packages/list_sub_group/add'] = 'listsubgroup/create';

$route['packages/partitions/add'] = 'listsubgroup/create';
$route['packages/partitions/update/(:any)'] = 'listsubgroup/update/$1';

$route['packages/map_offer_profile/add'] = 'listsubgroup/create';
$route['packages/map_offer_profile/update/(:any)'] = 'listsubgroup/update/$1';

$route['packages/pack_calc/add'] = 'listsubgroup/create';
$route['packages/pack_calc/update/(:any)'] = 'listsubgroup/update/$1';

$route['packages/list_duration/add'] = 'listduration/create';
$route['packages/list_duration/update/(:any)'] = 'listduration/update/$1';

$route['packages/buy_note/add'] = 'listduration/create';
$route['packages/buy_note/update/(:any)'] = 'listduration/update/$1';

$route['packages/list_packages/add'] = 'listduration/create';
$route['packages/list_packages/update/(:any)'] = 'listduration/update/$1';

$route['packages/gift_note/add'] = 'listduration/create';
$route['packages/gift_note/update/(:any)'] = 'listduration/update/$1';

$route['packages/recommend_packages/add'] = 'listduration/create';
$route['packages/recommend_packages/update/(:any)'] = 'listduration/update/$1';

$route['packages/(:any)'] = 'packages/getWording/$1';
$route['packages/(:any)/edit/(:any)'] = 'packages/edit/$1';
$route['packages/(:any)/update/(:any)'] = 'packages/update/$1';
$route['packages/(:any)/delete/(:any)'] = 'packages/delete/$1';

//$routes->post('channel/add','Channel::create');
//$routes->post('channel/update/(:segment)','Channel::update');
//
//$routes->post('dlg_notif/add','Channel::create');
//$routes->post('dlg_notif/update/(:segment)','Channel::update');

$route['wording/(:any)'] = 'wording/getWording/$1';
$route['wording/(:any)/add'] = 'wording/create/$1';
$route['wording/(:any)/edit/(:any)'] = 'wording/edit/$1';
$route['wording/(:any)/update/(:any)'] = 'wording/update/$1';
$route['wording/(:any)/delete/(:any)'] = 'wording/delete/$1';
