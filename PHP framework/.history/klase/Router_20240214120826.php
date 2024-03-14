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
        return Response::send("",0);
      }
      $poruka = "Osoba: $ime<br> " . "Spol: $spol<br>" . "Dob: $dob<br>" . "Osoba uspješno dodana.";

  }
}