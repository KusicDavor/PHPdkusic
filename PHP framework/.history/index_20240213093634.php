<?php
require_once 'Request.php';
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $request = new Request(['name' => $name, 'age' => $age]);
    $router = new Router();
    $router->handleRequest($request);
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <input type="submit" value="Submit">
</form>