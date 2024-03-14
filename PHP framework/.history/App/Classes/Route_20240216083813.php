<?php
namespace Classes;
class Route {
    public $method;
    public $path;
    public $callback;

    public function __construct($method, $path, $controller) {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
    }
}

global $routes;
$routes = [];