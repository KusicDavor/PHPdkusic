<?php
  require_once 'routes.php';
class Router {

  public function __construct() {
    $this->route();
}
public function route() {
  global $routes;

  // Define routes and callbacks
  $routes['/'] = function () {
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
          include 'views/index.html';
      } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
          $r1 = new Router();
          $r1->handleRequest($request);
      }
  };

  $routes['/login'] = function () {
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
          include 'views/login.html';
      }
  };

  $routes['/about'] = function () {
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
          echo "About Us";
      }
  };
}

  public function handleRequest(Request $request)
    {
      $method = $_SERVER['REQUEST_METHOD'];
      $path = trim($_SERVER['REQUEST_URI'], '/');
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');
      echo "method: $method, path: $path -------------- <br>";
      echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
      echo $request->getQueryParams();
  }
}