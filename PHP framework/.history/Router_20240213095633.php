<?php
class Router {
    private $routes = [];

    public function addRoute($method, $path, $callback)
    {
        // Normalize the path
        $path = trim($path, '/');
        
        // Add the route to the routes array
        $this->routes[$method][$path] = $callback;
    }

    public function handleRequest($request)
    {
        // Get the request method and path
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim($_SERVER['REQUEST_URI'], '/');

        // Check if the route exists
        if (isset($this->routes[$method][$path])) {
            // Execute the callback function
            $callback = $this->routes[$method][$path];
            call_user_func($callback, $request);
        } else {
            // Handle 404 Not Found
            echo '404 Not Found';
        }
    }
    public function handleRequest(Request $request)
    {
        $ime = $request->getParam('ime');
        $spol = $request->getParam('spol');
        $dob = $request->getParam('dob');
         echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
    }
}