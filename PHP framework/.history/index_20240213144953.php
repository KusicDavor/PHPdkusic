<?php
  require_once 'Router.php';
  require_once 'Request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
  $router = new Router();
  $router->handleRequest($request);
}
?> 

<form method="post">
    <label for="name">Ime:</label>
    <input style="margin: 10px" type="text" id="name" name="name" required><br>

    <label for="spol">Spol:</label>
        <select id="spol" name="spol">
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br>

    <label for="dob">Dob:</label>
    <input type="number" id="dob" name="dob" required><br>

    <input type="submit" value="Dodaj">
</form>