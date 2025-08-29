<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::Posts');
$routes->get('/Home/teste', 'Home::test');
$routes->get('/panel', 'Home::Posts');
$routes->get('/teste', 'Teste::index');
$routes->post('/post/store', 'PostController::store');
$routes->post('/post/store/(:any)?', 'PostController::store/$1');
$routes->get('/postagem/(:num)', 'PostController::getOne/$1');
$routes->get('/postagem/criar', 'PostController::criar');
$routes->get('/postagem/editar', 'PostController::editar');
$routes->get('/postagem/editar/(:num)', 'PostController::editar/$1');
$routes->get('/postagem/excluir/(:num)', 'PostController::excluir/$1');
$routes->get('/login', 'AuthController::index');
$routes->post('/auth/logar', 'AuthController::logar');
$routes->get('/auth/logoff', 'AuthController::logoff');
$routes->get('/post/control', 'PostController::control');