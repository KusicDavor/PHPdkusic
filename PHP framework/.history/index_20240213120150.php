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