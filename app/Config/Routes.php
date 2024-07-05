<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('index','Home::index');
$routes->get('login','Users::login');
$routes->get('registrate','Home::registrate');
$routes->get('acerca_de','Home::acerca_de');
$routes->get('quienes_somos','Home::quienes_somos');
$routes->get('productos','Home::productos');
$routes->get('cerrar_sesion', 'Users::cerrar_session');


// ------------------------------------------------
//$routes->get('user/tablero','Users::dashboard');
$routes->get('dashboard', 'Users::dashboard');
$routes->post('login', 'Users::iniciar_sesion');
$routes->post('registrate','Users::registrate');
