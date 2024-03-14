<?php
require_once 'Router.php';
require_once 'Request.php';

$r = new Router();
$routes = [];

$r->route('/', function () {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'views/index.html';
  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
    echo "tu sam";
    Router::handleRequest($request);
  }
}, 'GET');

$r->route('/login', function () {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'views/login.html';
  }
}, 'GET');

$r->route('/about', function () {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "About Us";
  }
}, 'GET');

$r->route('/404', function () {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Page not found";
  }
}, 'GET');