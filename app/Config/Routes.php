<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('createDatabase/(:segment)/(:segment)/(:segment)', 'DatabaseController::createDatabase/$1/$2/$3');
