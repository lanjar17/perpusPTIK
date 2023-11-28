<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\Dashboard::index');
$routes->get('/buku', 'Admin\Dashboard::buku');
$routes->get('/user', 'Admin\User::index');
$routes->get('/user/create', 'Admin\User::create');
$routes->get('/user/tambah', 'Admin\User::tambah');
$routes->get('/user/data', 'Admin\User::getData');
// $routes->get('/user/form', 'Admin\User::getForm');

$routes->get('/user/(:segment)', 'Admin\user::detail/$1');
$routes->post('/insertuser', 'Admin\User::insertAjax');
$routes->get('/user/edit/(:segment)', 'Admin\User::edit/$1'); // tampil form edit user
$routes->put('/user/update/(:segment)', 'Admin\User::update/$1'); //fungsi ubah user
$routes->delete('/user/delete/(:segment)', 'Admin\User::delete/$1'); //fungsi hapus user
// $routes->get('/', 'Login::index');

// $routes->post('/insertuser', 'Admin\User::insert');