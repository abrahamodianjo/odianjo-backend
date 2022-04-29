<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
 			/* 
			
			$routes->match(['get', 'post'], 'users/create', 'Users::create');
			$routes->get('/users', 'Users::index');
		
			$routes->put('/users/update/(:segement)',      'Users::update/$1');
		
			$routes->get('/users/delete_users/(:num)', 'Users::delete_users/$1');
			$routes->post('/users/create/', 'Users::create'); 
 */
 
		//$routes->resource('odianjo');
		
		//equivalent to these:
			$routes->match(['get', 'post'], 'odianjo/create', 'Odianjo::create');
			$routes->get('/odianjo', 'Odianjo::index');
			$routes->post('/odianjo/update/(:num)', 'Odianjo::update/$1');
			$routes->get('/odianjo/delete_users/(:num)', 'Odianjo::delete_users/$1');
			$routes->post('/odianjo/create', 'Odianjo::create'); 
			$routes->post('/odianjo/edit/(:num)', 'Odianjo::show/$1');
			$routes->get('/users', 'Users::index');
			
/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
