<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/', 'Home::index');
$routes->post('/auth/proses_login', 'Auth::proses_login');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/auth', 'Auth');
$routes->get('/logout', 'Auth::logout');
$routes->resource('barangview/kategori', ['controller' => 'KategoriLogistik']);
$routes->resource('barangview/satuan', ['controller' => 'Satuan']);
$routes->resource('barangview/list', ['controller' => 'Barang']);
$routes->resource('penerimaanview/list', ['controller' => 'PenerimaanLogistik']);
$routes->resource('pengeluaranview/list', ['controller' => 'PengeluaranLogistik']);
$routes->resource('pengajuanview/list', ['controller' => 'PengajuanBarang']);

// $routes->match(['post', 'put'], 'pengeluaranview/list/1', 'PengeluaranLogistik::update');
$routes->post('pengeluaranview/list(:any)', 'PengeluaranLogistik::update/$1');
$routes->put('pengeluaranview/list(:any)', 'PengeluaranLogistik::update/$1');
$routes->get('pengeluaranview/list(:any)', 'PengeluaranLogistik::update/$1');

$routes->get('laporan/barangLaporan', 'Laporan::index');
$routes->get('laporan/penerimaanLaporan', 'Laporan::penerimaan');
$routes->get('laporan/pengeluaranLaporan', 'Laporan::pengeluaran');
$routes->resource('user');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('laporan/cetak', 'Laporan::cetak');
$routes->get('laporan/cetakBarang', 'Laporan::cetakBarang');
$routes->get('laporan/cetakPenerimaan', 'Laporan::cetakPenerimaan');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
