<?php

class Router {
    private $routes = [];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function handleRequest($url) {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = $this->routes[$url]['controller'];
            $actionName = $this->routes[$url]['action'];

            require_once(__DIR__ . '/../controllers/UserController.php');

            $controller = new $controllerName();
            
            $controller->$actionName();
        } else {
            echo 'Route non trouvée.';
        }
    }
}