<?php
require_once 'Router.php';
require_once 'Request.php';
$routes = require 'routes.php';

$routes = require 'routes.php';

// Get the requested URL path
$requestUri = $_SERVER['REQUEST_URI'];

// Remove query string parameters from the URL
$requestUri = strtok($requestUri, '?');

// Check if the requested path matches any defined routes
if (isset($routes[$requestUri])) {
    // If a matching route is found, execute its corresponding callback
    $callback = $routes[$requestUri];
    if (is_callable($callback)) {
        // If the callback is callable, execute it
        $callback();
    } else {
        // Handle error: Callback is not callable
        echo "Error: Invalid callback for route '$requestUri'";
    }
} else {
    // If no matching route is found, return a 404 error
    http_response_code(404);
    echo "Error 404: Page not found";
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $name = $_POST['name'] ?? '';
//     $spol = $_POST['spol'] ?? '';
//     $dob = $_POST['dob'] ??'';
    
//     $request = new Request(['ime' => $name, 'spol' => $spol, 'dob' => $dob]);
//     $router = new Router();
//     $router->handleRequest($request);
// }

?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="spol">Spol:</label>
        <select id="spol" name="spol">
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br>

    <label for="dob">Dob:</label>
    <input type="number" id="dob" name="dob" required><br>

    <input type="submit" value="Dodaj">
</form>