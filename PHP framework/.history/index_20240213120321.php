<?php
$routes = [];

route('/', function () {
    echo "Home Page";
});

route('/login', function () {
    echo "Login Page";
});

function route(string $path, callable $callback) {
    global $routes;
    $routes[$path] = $callback;
}

run();

function run() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    foreach ($routes as $path => $callback) {
        if ($path !== $uri) continue;
        $callback;
    }
}