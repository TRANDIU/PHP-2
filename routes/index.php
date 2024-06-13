<?php

use Php2\Exam\Controllers\HomeController ;
use Bramus\Router\Router;
use Php2\Exam\Controllers\ProductController ;

// Create Router instance
$router = new Router();

$router->get('/', HomeController ::class . '@index');

$router->get('/products',             ProductController ::class . '@index');
$router->get('/products/create',      ProductController ::class . '@create');
$router->post('/products/store',      ProductController ::class . '@store');
$router->get('/products/{id}/edit',  ProductController ::class . '@edit');
$router->post('/products/{id}/update',ProductController ::class . '@update');
$router->get('/products/{id}/delete', ProductController ::class . '@delete');

// Run it!
$router->run();