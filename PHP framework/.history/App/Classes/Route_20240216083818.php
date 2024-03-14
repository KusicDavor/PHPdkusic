<?php
namespace Classes;
class Route {
    public $method;
    public $path;
    public $callback;

    public function __construct($method, $path, $callback) {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }
}

global $routes;
$routes = [];