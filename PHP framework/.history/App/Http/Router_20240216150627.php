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

  public static function obradiRequest() : ResponseInterface {
    $content = "";
    if (Router::$request->getParameter("method") == "GET") {
      parse_str(Router::$request->getParameter("query"), $requestGET);
      Router::$request = new Request($requestGET);
    }

    $ime = Router::$request->getParameter('ime');
    $spol = Router::$request->getParameter('spol');
    $dob = Router::$request->getParameter('dob');
    $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    $response = new Response(200, $content);
    $response->send();
    return $response;
  }

  public static function prikaziOsobu() : ResponseInterface {
    $content = "";
    $url = $_SERVER['REQUEST_URI'];

    $pattern = Router::buildPatternFromUrl(Router::$route->url);
    if (preg_match($pattern, $url, $matches)) {
        $ime = $matches[1];
        if (Router::$request->getParameter("ime") == )
    } else {
        echo "No match found";
    }

    // if (Router::$request->getParameter("method") == "GET") {
    //   parse_str(Router::$request->getParameter("query"), $requestGET);
    //   Router::$request = new Request($requestGET);
    // }

    // $ime = Router::$request->getParameter('ime');
    // $spol = Router::$request->getParameter('spol');
    // $dob = Router::$request->getParameter('dob');
    // $content = "Osoba:<br>Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";

    $response = new Response(200, $content);
    $response->send();
    return $response;
  }
  
}