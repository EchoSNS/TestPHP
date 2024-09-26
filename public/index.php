<?php
require '../vendor/autoload.php';

use Gray\Test\Router;

use Gray\Test\Controllers\RegisterController;
use Gray\Test\Controllers\UsersController;

$router  = new Router();

$router->get('/', RegisterController::class, 'index');
$router->post('/', RegisterController::class, 'createUser');

$router->get('/users', UsersController::class, 'index');

$router->dispatch();