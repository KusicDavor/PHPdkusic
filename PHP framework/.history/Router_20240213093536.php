<?php
class Router {
    public function handleRequest(Request $request)
    {
        // Process the request
        // Here you can access parameters from the Request object
        $name = $request->getParam('name');
        $age = $request->getParam('age');

        // Example: Output the parameters
        echo "Name: $name, Age: $age";

        // You can implement your routing logic here
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