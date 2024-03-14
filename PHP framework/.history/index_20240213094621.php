<?php
require_once 'Request.php';
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $name = $_POST['name'] ?? '';
    $age = $_POST['spol'] ?? '';
    $dob = $_POST['dob'] ??'';
    $request = new Request(['ime' => $name, 'spol' => $age]);
    $router = new Router();
    $router->handleRequest($request);
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="spol">Spol:</label>
        <select id="spol" name="spol">
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>

    <input type="submit" value="Submit">
</form>