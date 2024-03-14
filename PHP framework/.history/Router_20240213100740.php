<?php
class Router {
    private $routes = [];
    public function __construct(array $routes) {
        $this->addRoute('GET', '/', function ($request) {
            echo 'aha';
        });
        $this->addRoute('GET', '/home', function ($request) {
            echo 'Welcome to the homepage!';
        });
        
        $this->addRoute('GET', '/about', function ($request) {
            echo 'About Us';
        });
    }

    public function addRoute($method, $path, $callback)
    {
        // Normalize the path
        $path = trim($path, '/');
        
        // Add the route to the routes array
        $this->routes[$method][$path] = $callback;
    }

    public function handleRequest($request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim($_SERVER['REQUEST_URI'], '/');

        echo "method: $method, path: $path ------------- ";

        if (isset($this->routes[$method][$path])) {
            // Execute the callback function
            $callback = $this->routes[$method][$path];
            call_user_func($callback, $request);
        } else {
            // Handle 404 Not Found
            echo '404 Not Found';
        }
    }

    // public function handleRequest(Request $request)
    // {
    //     $ime = $request->getParam('ime');
    //     $spol = $request->getParam('spol');
    //     $dob = $request->getParam('dob');
    //     echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
    // }
}