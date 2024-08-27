<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
// $routes->get('/', 'Home::index');
// $routes->get('/', 'komik::index');
$routes->get('/', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');
// $routes->get('/komik1/index', 'Komik1::index');

$routes->get('/', 'komik::index');
$routes->get('/pages/komik', 'Pages::komik');
$routes->get('/komik/create', 'Komik::create');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
$routes->post('/komik/save', 'Komik::save');
$routes->get('/komik/detail(:any)', 'Komik::detail/$1');
// $routes->post('/komik/save', 'Komik::save');
$routes->get('/komik/edit/(:any)', 'Komik::edit/$1');
$routes->post('/komik/update/(:any)', 'Komik::update/$1');
$routes->delete('/komik/delete(:num)', 'Komik::delete/$1');
$routes->get('/komik/(:any)', 'Komik::index/$1');




// komik
// $routes->get('/komik/create', 'Komik::create');
// // $routes->post('/komik/save', 'Komik::save');
// $routes->get('/komik/edit/(:any)', 'Komik::edit/$1');
// $routes->delete('/komik/(:num)', 'Komik::delete/$1');
// $routes->get('/komik/(:any)', 'Komik::detail/$1');
// // komik