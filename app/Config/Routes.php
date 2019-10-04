<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login','Login::index');
$routes->post('/login','Login::submit');
$routes->get('/dashboard','Dashboard::index');
$routes->get('/publish','Dashboard::publish');
$routes->post('/runPublish','Dashboard::runPublish');

$routes->add('/wording/list_group/edit/(:segment)/(:segment)','Listgroup::edit');
$routes->post('/wording/list_group/update/(:segment)/(:segment)','Listgroup::update');
$routes->add('/wording/list_group','Listgroup::index');

$routes->post('/wording/list_sub_group/add','Listsubgroup::create');

$routes->post('/wording/packages/add','Packages::create');
$routes->post('/wording/packages/update/(:segment)','Packages::update');

$routes->post('/wording/list_packages/add','Listduration::create');
$routes->post('/wording/list_packages/update/(:segment)','Listduration::update');

$routes->post('/wording/recommend_packages/add','Listduration::create');
$routes->post('/wording/recommend_packages/update/(:segment)','Listduration::update');

$routes->post('/wording/map_offer_profile/add','Listsubgroup::create');
$routes->post('/wording/map_offer_profile/update/(:segment)','Listsubgroup::update');

$routes->post('/wording/pack_calc/add','Listsubgroup::create');
$routes->post('/wording/pack_calc/update/(:segment)','Listsubgroup::update');

$routes->post('/wording/list_duration/add','Listduration::create');
$routes->post('/wording/list_duration/update/(:segment)','Listduration::update');

$routes->post('/wording/buy_note/add','Listduration::create');
$routes->post('/wording/buy_note/update/(:segment)','Listduration::update');

$routes->post('/wording/gift_note/add','Listduration::create');
$routes->post('/wording/gift_note/update/(:segment)','Listduration::update');

$routes->add('/wording/(:segment)','Wording::getWording', ['as' => 'home_wording']);
$routes->post('/wording/(:segment)/add','Wording::create');
$routes->add('/wording/(:segment)/delete/(:segment)','Wording::delete');
$routes->add('/wording/(:segment)/edit/(:segment)','Wording::edit');
$routes->post('/wording/(:segment)/update/(:segment)','Wording::update');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
