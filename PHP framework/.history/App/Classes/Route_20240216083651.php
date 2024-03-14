<?php
namespace Classes;
class Route {
    public $method;
    public $path;
    public $controller;
    global $routes;
$routes = [];

    public function __construct($method, $path, $controller) {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
    }
}