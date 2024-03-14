<?php
namespace Classes;
class Route {
    public $method;
    public $path;
    callable $controller;

    public function __construct($method, $path, $controller) {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
    }
}