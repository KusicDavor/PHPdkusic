<?php
namespace Http;
class Router {

  public function route(string $path, callable $callback) {
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
      $httpKod = 200;

      if ($spol == "M") {
        $spol = "Muškarac";
      }

      if ($dob < 18) {
        $poruka = "Osoba je maloljetna. Nije moguće obraditi osobu.";
        $httpKod = 409;
      } else {
        $poruka = "Osoba: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
        $httpKod = 201;
      }
      $this->vratiPoruku($poruka, $httpKod);
  }

  private function vratiPoruku($poruka, $httpKod) {
    $response = new Response();
    $htmlContent = file_get_contents('<resources>views/poruka.html');
    $htmlContent = str_replace('$poruka', "<p>$poruka</p>", $htmlContent);
    return $response->send($httpKod, $htmlContent, "text/html");
  }
}