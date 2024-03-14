<?php
  require_once 'routes.php';
class Router {
  public function route(string $path, callable $callback, $method) {
    global $routes;
    $routes[$path] = $callback;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {
      echo $routes[]
      // if ($path !== $uri) {
      //   //staviti da vraća response tipa 404
      //   echo "404 Not Found";
      //   exit;
      // } else {
      // $found = true;
      // $callback();
      // exit;
      // }
    }
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