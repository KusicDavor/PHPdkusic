<?php
require_once 'Request.php';
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $ime = $_POST['ime'] ?? '';
    $age = $_POST['age'] ?? '';
    $request = new Request(['ime' => $ime, 'age' => $age]);
    $router = new Router();
    $router->handleRequest($request);
}
?>

<form method="post">
    <label for="ime">Ime:</label>
    <input type="text" id="ime" ime="ime" required><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" ime="age" required><br><br>

    <input type="submit" value="Submit">
</form>