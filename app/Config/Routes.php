<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/','Admin\Dashboard::index', ['filter' => 'auth']);
// $routes->get('/buku', 'Admin\Dashboard::buku');
$routes->get('/user','Admin\User::index', ['filter' => 'auth']);
$routes->get('/user/create', 'Admin\User::create');
$routes->get('/user/data','Admin\User::getData', ['filter' => 'auth']);
$routes->get('/user/tambah', 'Admin\User::tambah'); // tampil form tambah user
// $routes->get('/user/form', 'Admin\User::getForm');

$routes->get('/user/edit/(:segment)', 'Admin\User::edit/$1'); // tampil form edit user
$routes->get('/user/(:segment)', 'Admin\user::detail/$1');
$routes->post('/insertuser', 'Admin\User::insertAjax');
$routes->put('/user/update/(:segment)', 'Admin\User::update/$1'); //fungsi ubah user
$routes->delete('/user/delete/(:segment)', 'Admin\User::delete/$1'); //fungsi hapus user



$routes->get('/otentikasi', 'Otentikasi::index', ['filter' => 'noauth']); //halaman login
$routes->post('/masuk', 'Otentikasi::login'); //fungsi login
$routes->get('/keluar', 'Otentikasi::logout'); //fungsi logout

$routes->get('/testFaker', 'Faker::index');

$routes->get('/buku', 'Admin\BukuController::index', ['filter' => 'auth']);
$routes->get('/buku/(:any)', 'Admin\BukuController::index/$1', ['filter' => 'auth']);
$routes->post('/buku/(:any)', 'Admin\BukuController::index/$1', ['filter' => 'auth']);
// $routes->post('/insertuser', 'Admin\User::insert');