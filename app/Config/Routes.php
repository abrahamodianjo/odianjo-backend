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
 
		
		/* $routes->match(['get', 'post'], 'users/create', 'Users::create');
		$routes->get('users/(:segment)', 'Users::view/$1');
		$routes->get('users', 'Users::index');
		$routes->get('/', 'Home::index'); */

		
			$routes->match(['get', 'post'], 'users/create', 'Users::create');
			$routes->get('users', 'Users::index');
			$routes->get('users/update/(:num)', 'Users::update/$1');
			$routes->get('users/delete_users/(:num)', 'Users::delete_users/$1');
			$routes->post('users/create/', 'Users::create'); 

			/* //Update for REACT
			$routes->put('home/update/(:num)','Home::update/$1');
			$routes->get('home', 'Home::index');
			//$routes->post('home', 'Home::create');
			//$routes->get('home/(:segment)', 'Home::view/$1');
			//$routes->get('/', 'Home::index');
			$routes->match(['get', 'post'], 'home/create', 'Home::create'); */

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
