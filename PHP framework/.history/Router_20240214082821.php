<?php
  require_once 'routes.php';
class Router {

  public function route(string $path, callable $callback, $method) {
    $routes[$path] = $callback;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {
      if ($path !== $uri) continue;
      $callback();
      exit;
    }
    
    // if (!$found) {
    //     echo "Page not found";
    //     exit;
    // }
  }

  public function matchRoute($path, $method) {
    global $routes;
    $pathParts = explode('?', $path);
    $path = $pathParts[0];
    foreach ($routes as $route) {
      echo "123 --------- ";
        list($routePath, $callback, $routeMethod) = $route;

        if ($routePath === $path && $routeMethod === $method) {
          //return $callback;
        }
    }
    echo "234";
    return false;
}

  public function handleRequest(Request $request)
    {
      $method = $_SERVER['REQUEST_METHOD'];
      $path = trim($_SERVER['REQUEST_URI'], '/');
      // $ime = $request->getParam('ime');
      // $spol = $request->getParam('spol');
      // $dob = $request->getParam('dob');
      echo "method: $method, path: $path -------------- <br>";
      // echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
      echo $request->getQueryParams();
  }
}