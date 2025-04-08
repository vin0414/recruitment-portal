<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//functions
$routes->post('checkAuth','Home::checkAuth');
$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('overview','Home::overview');
});
