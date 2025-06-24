<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Rute CRUD Barang
$routes->get('/barang/index', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

// Tambahan untuk barang masuk dan keluar
$routes->get('/barang/masuk', 'Barang::formMasuk');
$routes->post('/barang/masuk/proses', 'Barang::proses_masuk');
$routes->get('barang/form_masuk', 'Barang::formMasuk');        // <== Tambahkan ini
$routes->post('barang/proses_masuk', 'Barang::proses_masuk'); // <== Tambahkan ini
$routes->get('/barang/keluar', 'Barang::formKeluar');
$routes->post('/barang/keluar/proses', 'Barang::proses_keluar');
$routes->get('/barang/form_keluar', 'Barang::formKeluar');
$routes->post('/barang/proses_keluar', 'Barang::proses_keluar');