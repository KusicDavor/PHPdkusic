<?php
class Router {
    private $routes = [];
    public function __construct() {
        $this->addRoute('GET', '/home', function ($request) {
           return 'something';
        });
        $this->addRoute('GET', '/about', function ($request) {
            echo 'About Us';
        });
    }

    public function addRoute($method, $path, $callback) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function handleRequest($request) {
        // Get the request method and path
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim($_SERVER['REQUEST_URI'], '/');

        // Find a matching route
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return "aha";
                // Execute the callback function for the matching route
                $callback = $route['callback'];
                $callback($request);
                return;
            }
        }

        // If no matching route is found, return a 404 error
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}