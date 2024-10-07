<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/User/login', 'UserController::loginGet');
$routes->get('/User/registr', 'UserController::registrGet');
$routes->get('/Book', 'BookController::indexGet');
$routes->get('/Book/BookForm', 'BookController::BookFormGet');
$routes->get('/Book/BookForm/(:num)', 'BookController::BookFormIDGet/$1');

$routes->post('/', 'Home::clikcButton');
$routes->post('/User/login', 'UserController::loginPost');
$routes->post('/User/registr', 'UserController::registrPost');
$routes->post('/Book', 'BookController::indexPost');
$routes->post('/Book/BookForm', 'BookController::BookFormPost');



$routes->get('/Course', 'CourseController::indexGet');

$routes->get('/Student', 'StudentController::indexGet');
$routes->get('/Student/cabinet/(:num)', 'StudentController::StudentFormIDGet/$1');
$routes->get('/Student/grade/(:num)', 'StudentController::StudentGradeIDGet/$1');


$routes->post('/Course', 'CourseController::indexPost');

$routes->post('/Student', 'StudentController::indexPost');
$routes->post('/Student/cabinet', 'StudentController::StudentFormPost');
$routes->post('/Student/grade', 'StudentController::StudentGradePost');
