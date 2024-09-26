<?php

namespace Gray\Test;

class Router{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method){
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action){
        $this->addRoute($route, $controller, $action, 'GET');
    }

    public function post($route, $controller, $action){
        $this->addRoute($route, $controller, $action, 'POST');
    }

    public function dispatch(){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if(array_key_exists($url, $this->routes[$method])){
            $controller = $this->routes[$method][$url]['controller'];
            $action = $this->routes[$method][$url]['action'];

            $controller = new $controller();
            $controller->$action();
        }
        else{
            $this->abort();
        }
    }

    private function abort($code = 404){
        http_response_code($code);

        require "Views/{$code}.php";

        die();
    }
}