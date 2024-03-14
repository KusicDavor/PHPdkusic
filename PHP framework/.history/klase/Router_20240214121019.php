<?php
namespace App;
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

  public function handleRequest(Request $request)
    {
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');

      if ($spol == "M") {
        $spol = "Muškarac";
      }

      if ($dob < 18) {
        $poruka = "Osoba je dodana jer je maloljetna.";
        return Response::send(200, $poruka);
      }
  }
}