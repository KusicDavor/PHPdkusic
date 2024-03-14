<?php
namespace Http;
use Classes\Route;
class Router {
   
  private $routes = [];
  
    public function addRoute(Route $route) {
        $this->routes[$route->method][$route->path] = $route->controller;
    }

    public function matchRoute() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                if ($routeUrl === $url) {
                    $target;
                }
            }
        }
    }

    public static function handle() {
      $htmlContent = file_get_contents('Resources/views/poruka.html');
      $htmlContent = str_replace('$poruka', "<p>poruka</p>", $htmlContent);
      $response = new Response(200, $htmlContent, "text/html");
      return $response->send();
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
    $htmlContent = file_get_contents('Resources/views/poruka.html');
    $htmlContent = str_replace('$poruka', "<p>$poruka</p>", $htmlContent);
    $response = new Response($httpKod, $htmlContent, "text/html");
    return $response->send();
  }
}