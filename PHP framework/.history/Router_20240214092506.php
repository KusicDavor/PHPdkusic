<?php
  require_once 'routes.php';
class Router {

  public function route(string $path, callable $callback, $method) {
    global $routes;
    $routes[$path] = $callback;
    $uri = strtok($_SERVER['REQUEST_URI'], '?');
    foreach ($routes as $routePath => $routeCallback) {
        $routePath = strtok($routePath, '?');

        if ($routePath === $uri) {
            $routeCallback();
            exit;
        }
    }
  }

  public function matchRoute($path, $method) {
    global $routes;
    echo "$path";
    $pathParts = explode('?', $path);
    $path = $pathParts[0];
    $uri = $_SERVER['REQUEST_URI'];
    foreach ($routes as $path => $callback) {
      if ($path !== $uri) continue;
      $callback();
    }

    return false;
}

  public function handleRequest(Request $request)
    {
      $method = $_SERVER['REQUEST_METHOD'];
      $path = trim($_SERVER['REQUEST_URI'], '/');
      //$query = $request->getQueryParams();
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');
      echo "<br> method: $method, path: $path -------------- <br>";
      echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
  }
}