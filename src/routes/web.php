<?php

use Blog\Controllers\AuthController;
use Blog\Controllers\HomeController;
use Blog\Controllers\PostController;
use Blog\Core\Router\Router;

session_start();

$router = new Router();

// Authentication routes
$router->get('login', [AuthController::class, 'login']);
$router->post('login', [AuthController::class, 'authenticate']);
$router->get('register', [AuthController::class, 'register']);
$router->post('register', [AuthController::class, 'store']);

// Home routes
$router->get('/', [HomeController::class, 'home']);
$router->post('logout', [HomeController::class, 'logout']);

// Post routes
$router->get('post/{post}/show', [PostController::class, 'show']);
$router->get('post/{post}/edit', [PostController::class, 'edit']);
$router->post('post/{post}/edit', [PostController::class, 'update']);
$router->post('post/{post}/delete', [PostController::class, 'delete']);
$router->post('create-post', [PostController::class, 'store']);


$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
