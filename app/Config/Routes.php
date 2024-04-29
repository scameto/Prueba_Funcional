<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Home:
$routes->get('/', 'HomeController::index');

$routes->get('/chat', 'ChatController::index');

//direcciones
$routes->get('direccion', 'DireccionController::index');
$routes->get('direccion/create', 'DireccionController::show');
$routes->post('direccion', 'DireccionController::create');
$routes->get('direccion/(:segment)', 'DireccionController::show/$1');
$routes->put('direccion/(:segment)', 'DireccionController::update/$1');
$routes->get('direccion/delete/(:segment)', 'DireccionController::delete/$1');

//reservas
$routes->get('reservas', 'ReservasController::index');
$routes->get('reservas/create', 'ReservasController::show');
$routes->post('reservas', 'ReservasController::create');
$routes->get('reservas/(:segment)', 'ReservasController::show/$1');
$routes->put('reservas/(:segment)', 'ReservasController::update/$1');
$routes->get('reservas/delete/(:segment)', 'ReservasController::delete/$1');

// Alojamiento
$routes->get('alojamiento', 'AlojamientoController');
$routes->get('alojamiento/create', 'AlojamientoController::showCreate');
$routes->post('alojamiento/create', 'AlojamientoController::create');

//Opiniones
$routes->post('opiniones/guardar_opiniones', 'OpinionesController::createOpiniones');
$routes->get('opiniones', 'OpinionesController::index');