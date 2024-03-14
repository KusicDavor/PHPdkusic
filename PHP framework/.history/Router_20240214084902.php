<?php
  require_once 'routes.php';
class Router {

  public function route(string $path, callable $callback, $method) {
    //echo $this->matchRoute($path, $method);
    global $routes;
    $routes[$path] = $callback;
    $uri = $_SERVER['REQUEST_URI'];
    foreach ($routes as $path => $callback) {
      if ($path !== $uri) continue;
      $callback();
      exit;
    }
  }

  public function matchRoute($path, $method) {
    global $routes;
    $pathParts = explode('?', $path);
    $path = $pathParts[0];

    foreach ($routes as $route) {
        list($routePath, $callback, $routeMethod) = $route;

        if ($routePath === $path && $routeMethod === $method) {
            return $callback;
        }
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
      echo "method: $method, path: $path -------------- <br>";
      echo $
      //echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
  }
}