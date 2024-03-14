<?php
namespace Classes;
class Route {
    public $url;
    public $path;
    public $callback;

    public function __construct($url, $path, $callback) {
        $this->url = $url;
        $this->path = $path;
        $this->callback = $callback;
    }
}