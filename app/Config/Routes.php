<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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
//$routes->get('subject', 'Subject::index');
//$routes->get('sub/add', 'Subject::sub_add');

$routes->group('section', function($routes){
	$routes->get('/', 'Section::index');
	//$routes->get('create', 'Section::create');
	$routes->post('create', 'Section::create');
	$routes->get('edit/(:any)', 'Section::edit/$1');
	//$routes->put('update', 'Section::update');
	$routes->delete('delete/(:any)', 'Section::delete');
});

$routes->group('student', function($routes){
	$routes->get('/', 'Student::index');
	$routes->get('register', 'Student::register');
	//$routes->post('store', 'Student::store');
	$routes->get('edit/(:any)', 'Student::edit/$1');
	//$routes->put('update', 'Student::update');
	$routes->delete('delete/(:any)', 'Student::delete');
	$routes->get('grade/(:any)/(:any)', 'Student::grade');
	$routes->post('grade', 'Student::grade');
	$routes->get('result/(:any)', 'Student::result');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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
