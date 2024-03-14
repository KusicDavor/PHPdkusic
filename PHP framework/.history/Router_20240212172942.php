<?php
class Router {
    private $routes = [];

    public function addRoute(Request $request) {
        $this->routes[] = $request;
    }

    public function handleRequest($url, $method) {
        foreach ($this->routes as $route) {
            if ($route->getUrl() === $url && $route->getMethod() === $method) {
                $callback = $route->getCallback();
                if (is_callable($callback)) {
                    call_user_func($callback);
                    return;
                }
            }
        }
        echo "404 Not Found";
    }
}

// Example usage:
$router = new Router();

// Define routes
$request1 = new Request('/route1', 'GET', function() {
    echo "Handler for route1";
});
$router->addRoute($request1);

$request2 = new Request('/route2', 'POST', function() {
    echo "Handler for route2";
});
$router->addRoute($request2);