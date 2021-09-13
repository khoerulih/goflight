<?php

namespace Config;

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');

$routes->get('/user', 'User::index');
$routes->get('/user/transaksi', 'User::transaksi');

$routes->get('/pesan', 'Pesan::index');
$routes->get('/pesan/(:num)', 'Pesan::detail/$1');

$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/(:num)', 'Transaksi::detail/$1');
$routes->get('/transaksi/exportpdf/(:num)', 'Transaksi::exportPdf/$1');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/user-list/(:num)', 'Admin::userDelete/$1', ['filter' => 'role:admin']);

$routes->get('/maskapai', 'Maskapai::index', ['filter' => 'role:admin']);
$routes->get('/maskapai/create', 'Maskapai::create', ['filter' => 'role:admin']);
$routes->get('/maskapai/edit/(:num)', 'Maskapai::edit/$1', ['filter' => 'role:admin']);
$routes->delete('/maskapai/(:num)', 'Maskapai::delete/$1', ['filter' => 'role:admin']);

$routes->get('/tiket', 'Tiket::index', ['filter' => 'role:admin']);
$routes->get('/tiket/create', 'Tiket::create', ['filter' => 'role:admin']);
$routes->get('/tiket/edit/(:num)', 'Tiket::edit/$1', ['filter' => 'role:admin']);
$routes->delete('/tiket/(:num)', 'Tiket::delete/$1', ['filter' => 'role:admin']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
