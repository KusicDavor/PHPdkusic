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


  public function vratiPoruku($poruka) {
    echo "ovo";
  }

  public function handleRequest(Request $request)
    {
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');
      $response = new Response();

      if ($spol == "M") {
        $spol = "Muškarac";
      }

      if ($dob < 18) {
        $poruka = "Osoba je maloljetna. Nije moguće dodati osobu.";
        $this->vratiPoruku($poruka);
        return $response->send(200, $poruka, "");
      } else {
        $poruka = "Osoba: $ime\nSpol: $spol\nDob: $dob\nOsoba uspješno dodana.";
        return $response->send(201, $poruka, "");
      }
  }
}