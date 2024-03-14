<?php

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $callback)
    {
        $this->routes[$method][$path] = $callback;
    }

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function route($method, $path)
    {
        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            return $callback();
        } else {
            return '404 Not Found';
        }
    }
}

// Create a new Router instance
$router = new Router();

// Define routes
$router->get('/', function() {
    return 'Welcome to the home page!';
});

$router->get('/home', function() {
    return 'hi'; // Return "hi" for the /home route
});

// Add more routes as needed

?>