<?php

namespace Config;

use Myth\Auth\Config;

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


/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function ($routes) {
	// Login/out
	$routes->get('login', 'AuthController::login', ['as' => 'login']);
	$routes->post('login', 'AuthController::attemptLogin');
	$routes->get('logout', 'AuthController::logout');

	// Registration
	// $routes->get('register', 'AuthController::register', ['as' => 'register']);
	$routes->get('register', 'AuthController::register', ['as' => 'register', 'filter' => 'role:Superuser,Administrator']);
	$routes->post('register', 'AuthController::attemptRegister');

	// Activation
	$routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
	$routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

	// Forgot/Resets
	$routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
	$routes->post('forgot', 'AuthController::attemptForgot');
	$routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
	$routes->post('reset-password', 'AuthController::attemptReset');
});

// Users
$routes->get('/users', 'Users::index', ['filter' => 'role:Superuser,Administrator']);
$routes->get('/users/index', 'Users::index', ['filter' => 'role:Superuser,Administrator']);
$routes->get('/users/(:num)', 'Users::edit/$1', ['filter' => 'role:Superuser,Administrator']);
$routes->post('/users/(:num)', 'Users::update/$1', ['filter' => 'role:Superuser,Administrator']);
$routes->delete('/users/(:num)', 'Users::delete/$1', ['filter' => 'role:Superuser,Administrator']);

// Konsumen Page
$routes->get('/konsumen', 'Konsumen::index');
$routes->get('/konsumen/create', 'Konsumen::create');
$routes->get('/konsumen/status_approval', 'Konsumen::statusApproval');
$routes->get('/konsumen/akan_lunas', 'Konsumen::akanLunas');
$routes->get('/konsumen/sudah_lunas', 'Konsumen::sudahLunas');
$routes->get('/konsumen/dpd', 'Konsumen::dpd');
$routes->get('/konsumen/nunggak', 'Konsumen::nunggak');
$routes->get('/konsumen/rejected', 'Konsumen::rejected');
$routes->get('/konsumen/(:segment)', 'Konsumen::detail/$1');
$routes->get('/konsumen/(:num)/edit', 'Konsumen::edit/$1');
$routes->get('/konsumen/(:num)/survey_edit', 'Konsumen::surveyEdit/$1');
$routes->delete('/konsumen/(:num)', 'Konsumen::delete/$1');

// Akun Page
$routes->get('/akun/create/(:num)', 'Akun::create/$1');
$routes->get('/akun/kembali', 'Akun::kembali');
$routes->get('/akun/status', 'Akun::status');
$routes->get('/akun/batal', 'Akun::batal');
$routes->get('/akun/riwayat/(:num)', 'Akun::show/$1');
$routes->get('/akun/(:segment)', 'Akun::detail/$1');
$routes->delete('/akun/(:num)', 'Akun::delete/$1');

// Transaksi
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/transaksi/create/(:num)', 'Transaksi::create/$1');
$routes->get('/transaksi/edit/(:segment)', 'Transaksi::edit/$1');

// Berita Acara
$routes->get('/berita_acara', 'Beritaacara::index');
$routes->get('/berita_acara/(:segment)', 'Beritaacara::detail/$1');

// Kwitansi
$routes->get('/kwitansi', 'Kwitansi::index');
// $routes->get('/kwitansi/permit', 'Kwitansi::permit');
$routes->get('/kwitansi/(:num)', 'Kwitansi::cetak/$1');
$routes->get('/kwitansi/kwitansiperjanjian', 'Kwitansi::kwitansiPerjanjian');
$routes->get('/kwitansi/cetak_kwitansi/(:num)', 'Kwitansi::cetakKwitansi/$1');

// Report
$routes->get('/report/input_data', 'Report::inputData');
$routes->get('/report/input_transaksi', 'Report::inputTransaksi');
$routes->get('/report/data_total', 'Report::dataTotal');
$routes->get('/report/data_aktif', 'Report::dataAktif');
$routes->get('/report/kwitansi_print', 'Report::kwitansiPrint');
$routes->get('/report/sisa_kwitansi', 'Report::sisaKwitansi');
$routes->get('/report/uang_masuk', 'Report::uangMasuk');

// Pegawai
$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/create', 'Pegawai::create');
$routes->get('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->delete('/pegawai/(:num)', 'Pegawai::delete/$1');

// Slip Gaji
$routes->get('/slipgaji', 'SlipGaji::index/$1');
$routes->get('/slipgaji/create', 'SlipGaji::create/$1');
$routes->get('/slipgaji/edit/(:num)', 'SlipGaji::edit/$1');
$routes->delete('/slipgaji/(:num)', 'SlipGaji::delete/$1');

// Surveyor
$routes->get('/surveyor', 'Surveyor::index');
$routes->get('/surveyor/sla', 'Surveyor::sla');
$routes->get('/surveyor/fpd', 'Surveyor::fpd');



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
