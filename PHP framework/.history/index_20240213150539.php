<?php
  require_once 'Router.php';
  require_once 'Request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
  $router = new Router();
  $router->handleRequest($request);
}
?> 

<html>
<div style="display: inline-block">
<p>Dodavanje novog korisnika</p>
<form method="post">
    <label for="name">Ime:</label>
    <input style="margin-left: 10px" type="text" id="name" name="name" required><br>

    <label for="spol">Spol:</label>
        <select style="margin-left: 6px; font-size: 16; margin-top: 8px" id="spol" name="spol">
            <option value="M">M</option>
            <option value="Ž">Ž</option>
        </select><br>

    <label for="dob">Dob:</label>
    <input style="margin-left: 7px; margin-top: 8px" type="number" id="dob" name="dob" required><br>

    <input style="font-weight: 600; margin-top: 7px; background-color: aqua" type="submit" value="Dodaj (POST)">
	<input style="font-weight: 600; margin-top: 7px; background-color: tomato; display: inline; margin-left: 22px" type="submit" value="Dodaj (GET)">
</form>
</div>