<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('index','Home::index');
$routes->get('registrate','Home::registrate');
$routes->get('acerca_de','Home::acerca_de');
$routes->get('quienes_somos','Home::quienes_somos');
$routes->get('productos','Home::productos');


// ------------------------------------------------
//$routes->get('user/tablero','Users::dashboard');
$routes->get('login','Users::login');
$routes->post('login', 'Users::iniciar_sesion');
$routes->post('registrate','Users::registrate');
$routes->get('dashboard', 'Users::dashboard');
$routes->get('cerrar_sesion', 'Users::cerrar_session');


$routes->get('edit_user/(:num)', 'Users::edit_user/$1');
$routes->post('edit_user/(:num)', 'Users::update_user');

$routes->get('add_user', 'Users::add_user');
$routes->post('add_user', 'Users::cargar_user');

$routes->get('delete_user/(:num)','Users::delete_user/$1');