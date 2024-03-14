<?php
class Router {
    private $routes = [];

    public function addRoute($method, $path, $callback) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function handleRequest1($request) {
        // Get the request method and path
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim($_SERVER['REQUEST_URI'], '/');


        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $callback = $route['callback'];
                $callback($request);
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }

    public function handleRequest(Request $request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim($_SERVER['REQUEST_URI'], '/');

        $ime = $request->getParam('ime');
        $spol = $request->getParam('spol');
        $dob = $request->getParam('dob');
        echo "method: $method, path: $path --------------";
        echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
    }
}