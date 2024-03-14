<?php
namespace Classes;
class Route {
    public $method;
    public $path;
    public $controller;

    public function __construct($method, $path, callable $controller) {
        $this->method = $method;
        $this->path = $path;
        $this->controller = $controller;
    }
}