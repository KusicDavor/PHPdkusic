<?php
require_once 'Router.php';
$r = new Router();
$routes = [];

$r->route('/', function () {
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "ovo je get";
    include 'views/index.html';
  } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Router::handleRequest($_REQUEST);
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