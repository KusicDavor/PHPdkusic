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
      $poruka = "Osoba: $ime <br> " . "uspješno dodana.";
      $response = new Response($poruka);
      echo $response->send();
      echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
  }
}