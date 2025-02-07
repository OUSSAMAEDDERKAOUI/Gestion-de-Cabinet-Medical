<?php
session_start();

require_once '../app/core/Router.php';

$router = new Router();
$router->addRoute('index.php/signup', 'UserController', 'signup');
$router->addRoute('index.php/login', 'UserController', 'login');
$router->addRoute('index.php/dashboard', 'UserController', 'index');
$router->addRoute('index.php', 'UserController', 'index');

// Récupérer l'URL de la requête
$url = isset($_GET['action']) ? $_GET['action'] : 'login';
$uri = $_SERVER["REQUEST_URI"];
$path = explode('/',$uri,3);
echo $path[2];
$router->handleRequest($path[2]   );




