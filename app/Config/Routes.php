<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//functions
$routes->post('checkAuth','Home::checkAuth');
$routes->get('verify/(:any)','Home::verifyAccount/$1');
$routes->get('logout','Home::logout');
//accounts
$routes->get('fetch-account','Home::fetchAccount');
$routes->post('save-account','Home::saveAccount');
$routes->post('reset-account','Home::resetAccount');
//settings
$routes->get('fetch-role','Home::fetchRole');
$routes->get('fetch-office','Home::fetchOffice');
$routes->post('save-office','Home::saveoffice');

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('overview','Home::overview');
    //account
    $routes->get('accounts','Home::manageAccount');
    $routes->get('create-account','Home::createAccount');
    $routes->get('edit-account/(:any)','Home::editAccount/$1');
    //settings and maintenance
    $routes->get('settings','Home::settings');
});