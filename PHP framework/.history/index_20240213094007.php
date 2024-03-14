<?php
require_once 'Request.php';
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $name = $_POST['name'] ?? '';
    $spol = $_POST['spol'] ?? '';
    $request = new Request(['name' => $name, 'spol' => $spol]);
    $router = new Router();
    $router->handleRequest($request);
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="spol">Spol:</label>
    <input type="number" id="spol" name="spol" required><br><br>

    <input type="submit" value="Submit">
</form>