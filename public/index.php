<?php
session_start();

require_once '../app/core/Router.php';

$router = new Router();

$router->addRoute('signup', 'UserController', 'signup');
$router->addRoute('login', 'UserController', 'login');
$router->addRoute('dashboard', 'UserController', 'index');

// Récupérer l'URL de la requête
$url = isset($_GET['action']) ? $_GET['action'] : 'login';

$router->handleRequest($url);




print_r($_GET);