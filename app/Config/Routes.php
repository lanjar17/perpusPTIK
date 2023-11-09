<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\Dashboard::index');
$routes->get('/buku', 'Admin\Dashboard::buku');
$routes->get('/user', 'Admin\User::index');
$routes->get('/user/create', 'Admin\User::create');
$routes->get('/user/data', 'Admin\User::getData');
// $routes->get('/user/form', 'Admin\User::getForm');

$routes->get('/user/(:segment)', 'Admin\user::detail/$1');

$routes->get('/', 'Login::index');
$routes->post('/insertuser', 'Admin\User::insertAjax');
// $routes->post('/insertuser', 'Admin\User::insert');