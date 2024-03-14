<?php
  require_once 'Router.php';
  require_once 'Request.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
  $router = new Router();
  $router->handleRequest($request);
}
?> 