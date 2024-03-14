<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  private static $routes = [];
  private static $route;
  private static $request;
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  public function handleRequest(Request $request) {
    Router::$request = $request;
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    foreach (Router::$routes as $route) {
      if ($this->matchRoute($url, $route) && $route->method === $method) {
        Router::$route = $route;
        call_user_func($route->callback);
        return;
      }         
    }
    http_response_code(404);
    echo "ne postoji";
  }

  public function matchRoute(string $url, Route $route): bool {
    $pattern = Router::buildPatternFromUrl($route->url);
    return preg_match($pattern, $url) === 1;
  }

  private static function buildPatternFromUrl(string $url): string {
    return '#^' . preg_replace('#\{[^/]+\}#', '([^/]+)', $url) . '$#';
  }

  //dohvaćanje requesta ovisno o metodi
  public static function obradiRequest() : ResponseInterface {
    if (Router::$request->getParameter("method") == "GET") {
      parse_str(Router::$request->getParameter("query"), $requestGET);
      Router::$request = new Request($requestGET);
    }

    $response = new Response(200, Router::dohvatiParametreReq(Router::$request));
    $response->send();
    return $response;
  }

  private static function dohvatiParametreReq(Request $request) : string {
    $ime = Router::$request->getParameter('ime');
    $spol = Router::$request->getParameter('spol');
    $dob = Router::$request->getParameter('dob');
    $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    return $content;
  }

  private static function 

  public static function prikaziOsobu() : ResponseInterface {
    $url = $_SERVER['REQUEST_URI'];
    $pattern = Router::buildPatternFromUrl(Router::$route->url);
    if (preg_match($pattern, $url, $matches)) {
        $parametarIme = $matches[1];
        if (Router::$request->getParameter("ime") == $parametarIme){
          $content = "postoji";
        } else {
          $content =  "No match found";
        }
      }

    $response = new Response(200, $content);
    $response->send();
    return $response;
  }
  
}