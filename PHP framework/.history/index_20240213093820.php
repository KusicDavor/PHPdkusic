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
    <label for="ime">Ime:</label>
    <input type="text" id="ime" name="ime" required><br><br>

    <label for="spol">Spol:</label>
        <select id="spol" name="spol" required>
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br><br>

    <input type="submit" value="Submit">
</form>