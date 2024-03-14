<?php
  require_once 'routes.php';
class Router {


  public function route(string $path, callable $callback, $method) {
    global $routes;
    $routes[$path] = $callback;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    echo ;
    foreach ($routes as $path => $callback) {
      if ($path !== $uri) {
        //$this->handleNotFound();
        //exit;
      } else {
      $found = true;
      $callback();
      exit;
      }
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

  public function handleNotFound() {
    http_response_code(404);
    echo "Page not found";
}
}