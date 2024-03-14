<?php
require_once 'Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $spol = $_POST['spol'] ?? '';
    $dob = $_POST['dob'] ??'';

    require_once 'Request.php';
    echo "1";
    $router = new Router();
    $request = new Request(['ime' => $name, 'spol' => $spol, 'dob' => $dob]);
    $router->handleRequest($request);
}

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