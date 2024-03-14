<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  private static $routes = [];
  private static $route;
  private static $request;

  // metoda za dodavanje nove rute
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  // metoda za resolvanje rute 
  public function handleRequest(Request $request) {
    Router::$request = $request;
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    foreach (Router::$routes as $route) {
      if ($this->matchRoute($url, $route) && $route->method === $method) {
        Router::$route = $route;
        call_user_func($route->callback);
        return;
      }  else {
        echo "Metoda ne postoji.";
        return;
      }        
    }
    http_response_code(404);
    echo "Stranica ne postoji.";
  }

  // za usporedbu url-a i definiranog url-a u ruti
  public function matchRoute(string $url, Route $route): bool {
    $pattern = Router::buildPatternFromUrl($route->url);
    return preg_match($pattern, $url) === 1;
  }

  // za prepoznavanje s placeholderima
  private static function buildPatternFromUrl(string $url): string {
    return '#^' . preg_replace('#\{[^/]+\}#', '([^/]+)', $url) . '$#';
  }

  // vadi parametre iz requesta i vraća ih u stringu
  private static function dohvatiParametreReq() : string {
    $ime = Router::$request->getParameter('ime');
    $spol = Router::$request->getParameter('spol');
    $dob = Router::$request->getParameter('dob');
    $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    return $content;
  }

    // za putanju "/"
    public static function index() : ResponseInterface {
      if (Router::$request->getParameter("method") == "GET") {
        parse_str(Router::$request->getParameter("query"), $requestGET);
        Router::$request = new Request($requestGET);
      }
      $response = new Response(200, Router::dohvatiParametreReq());
      $response->send();
      return $response;
    }

  // za putanju "/osobe/{ime}
  public static function prikaziOsobu() : ResponseInterface {
    $url = $_SERVER['REQUEST_URI'];
    $pattern = Router::buildPatternFromUrl(Router::$route->url);
    if (preg_match($pattern, $url, $matches)) {
        $parametarIme = $matches[1];
        if (Router::$request->getParameter("ime") == $parametarIme){
          $content = Router::dohvatiParametreReq();
        } else {
          $content =  "No match found";
        }
      }

    $response = new Response(200, $content);
    $response->send();
    return $response;
  }
  
}