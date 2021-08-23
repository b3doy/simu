<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Home::index');

// Static Page
$routes->get('/page', 'Page::index');

// Konsumen Page
$routes->get('/konsumen', 'Konsumen::index');
$routes->get('/konsumen/create', 'Konsumen::create');
$routes->get('/konsumen/akan_lunas', 'Konsumen::akanLunas');
$routes->get('/konsumen/sudah_lunas', 'Konsumen::sudahLunas');
$routes->get('/konsumen/dpd', 'Konsumen::dpd');
$routes->get('/konsumen/nunggak', 'Konsumen::nunggak');
$routes->get('/konsumen/(:segment)', 'Konsumen::detail/$1');
$routes->get('/konsumen/(:num)/edit', 'Konsumen::edit/$1');
$routes->delete('/konsumen/(:num)', 'Konsumen::delete/$1');

// Akun Page
$routes->get('/akun/create/(:num)', 'Akun::create/$1');
$routes->get('/akun/kembali', 'Akun::kembali');
$routes->get('/akun/batal', 'Akun::batal');
$routes->get('/akun/riwayat/(:num)', 'Akun::show/$1');
$routes->get('/akun/(:segment)', 'Akun::detail/$1');
$routes->delete('/akun/(:num)', 'Akun::delete/$1');

// Transaksi
$routes->get('/transaksi/create/(:num)', 'Transaksi::create/$1');
// $routes->get('/transaksi/(:segment)', 'Transaksi::detail/$1');

// Berita Acara
$routes->get('/berita_acara', 'Beritaacara::index');
$routes->get('/berita_acara/(:num)', 'Beritaacara::detail/$1');

// Kwitansi
$routes->get('/kwitansi', 'Kwitansi::index');
// $routes->get('/kwitansi/permit', 'Kwitansi::permit');
$routes->get('/kwitansi/(:num)', 'Kwitansi::cetak/$1');
$routes->get('/kwitansi/kwitansiperjanjian', 'Kwitansi::kwitansiPerjanjian');
$routes->get('/kwitansi/cetak_kwitansi/(:num)', 'Kwitansi::cetakKwitansi/$1');

// Report
$routes->get('/report/input_data', 'Report::inputData');
$routes->get('/report/data_total', 'Report::dataTotal');
$routes->get('/report/kwitansi_print', 'Report::kwitansiPrint');

// Pegawai
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/create', 'Pegawai::create');
$routes->get('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->delete('/pegawai/(:num)', 'Pegawai::delete/$1');

// Users
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
