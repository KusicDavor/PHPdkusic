<?php
require_once 'Request.php';
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the form
    $ime = $_POST['ime'] ?? '';
    $spol = $_POST['spol'] ?? '';
    $request = new Request(['ime' => $ime, 'spol' => $spol]);
    $router = new Router();
    $router->handleRequest($request);
}
?>

<form method="post">
    <label for="ime">Ime:</label>
    <input type="text" id="ime" ime="ime" required><br><br>
    <label for="spol">Spol:</label>
        <select id="spol" ime="spol" required>
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br><br>

    <input type="submit" value="Submit">
</form>