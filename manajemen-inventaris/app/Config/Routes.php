<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');


// -----------------------------
// 🔐 Auth/Login Routes
// -----------------------------
$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login');
$routes->get('/logout', 'User::logout');


// -----------------------------
// 📦 CRUD Barang Routes
// -----------------------------
$routes->group('barang', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Barang::index');
    $routes->get('create', 'Barang::create');
    $routes->post('store', 'Barang::store');
    $routes->get('edit/(:num)', 'Barang::edit/$1');
    $routes->post('update/(:num)', 'Barang::update/$1');
    $routes->get('delete/(:num)', 'Barang::delete/$1');

    // Barang Masuk
    $routes->get('masuk', 'Barang::formMasuk');
    $routes->post('masuk/proses', 'Barang::proses_masuk');
    $routes->get('form_masuk', 'Barang::formMasuk');        
    $routes->post('proses_masuk', 'Barang::proses_masuk');

    // Barang Keluar
    $routes->get('keluar', 'Barang::formKeluar');
    $routes->post('keluar/proses', 'Barang::proses_keluar');
    $routes->get('form_keluar', 'Barang::formKeluar');
    $routes->post('proses_keluar', 'Barang::proses_keluar');
});
