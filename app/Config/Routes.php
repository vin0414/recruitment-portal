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
//point system
$routes->get('fetch-education-data','Job::fetchEducationData');
$routes->get('fetch-training-data','Job::fetchTrainingData');
$routes->get('fetch-experience-data','Job::fetchExperienceData');
$routes->post('save-education-data','Job::saveEducation');
$routes->post('save-training-data','Job::saveTraining');
$routes->post('save-experience-data','Job::saveExperience');
//accounts
$routes->get('fetch-account','Home::fetchAccount');
$routes->post('save-account','Home::saveAccount');
$routes->post('reset-account','Home::resetAccount');
$routes->post('modify-account','Home::modifyAccount');
//role
$routes->post('save-role','Home::saveRole');
$routes->get('fetch-role','Home::fetchRole');
$routes->get('fetch-edit-role','Home::editRole');
$routes->post('update-role','Home::updateRole');
//office
$routes->get('fetch-office','Home::fetchOffice');
$routes->get('fetch-edit-office','Home::editOffice');
$routes->post('save-office','Home::saveOffice');
$routes->post('update-office','Home::updateOffice');
//course
$routes->get('fetch-courses','Home::fetchCourses');
$routes->get('fetch-edit-course','Home::editCourse');
$routes->post('save-course','Home::saveCourse');
$routes->post('update-course','Home::updateCourse');
//application
$routes->get('fetch-app','Home::fetchApp');
$routes->post('save-category','Home::saveCategory');
$routes->get('edit-category','Home::editCategory');
$routes->post('update-category','Home::updateCategory');
//types of office
$routes->get('fetch-types','Home::fetchTypes');
$routes->post('save-types','Home::saveTypes');
$routes->get('edit-types','Home::editTypes');
$routes->post('update-types','Home::updateTypes');
//system password
$routes->post('system-password','Home::systemPassword');
$routes->post('change-password','Home::changePassword');
//competencies
$routes->get('fetch-competence','Home::fetchCompetence');
$routes->post('save-competence','Home::saveCompetence');
$routes->get('fetch-edit-competence','Home::editCompetence');
$routes->post('update-competence','Home::updateCompetence');

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('overview','Home::overview');
    //job posting
    $routes->get('jobs','Home::jobPosting');
    $routes->get('jobs/create','Home::createJob');
    //point system
    $routes->get('point-system','Home::pointSystem');
    //account
    $routes->get('accounts','Home::manageAccount');
    $routes->get('create-account','Home::createAccount');
    $routes->get('edit-account/(:any)','Home::editAccount/$1');
    //settings and maintenance
    $routes->get('settings','Home::settings');
    //my account
    $routes->get('my-account','Home::myAccount');
});