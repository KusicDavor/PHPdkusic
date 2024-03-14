<?php
namespace Classes;
class Route {
    public $url;
    public $method;
    public $callback;

    public function __construct($url, $method, $callback) {
        $this->url = $url;
        $this->method = $method;
        $this->callback = $callback;
    }
}