<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  private static $routes = [];
  private static $route;
  private static $request;
  private static $response;

  // metoda za dodavanje nove rute
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  // metoda za resolvanje rute 
  public static function handleRequest() : ResponseInterface {
    Router::$response = new Response(200, "");
    Router::$request = $_REQUEST;

    $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
    $url = $parsedUrl['path'];
    $method = $_SERVER["REQUEST_METHOD"];

    $postoji = 0;

    foreach (Router::$routes as $route) {
      if (Router::matchRoute($url, $route) && $route->method === $method) {
        Router::$route = $route;
        if(is_callable($route->callback)) {
          
          $postoji = 1;
          return call_user_func($route->callback, Router::$request);
        } else {
          $postoji = 2;
          Router::$response->setStatusCode(405);
          Router::$response->setContent("Metoda ne postoji.");
        }
      }        
    }

    if ($postoji == 0) {
      Router::$response->setStatusCode(404);
      Router::$response->setContent("Stranica ne postoji.");
    }
    return Router::$response;
  }

  // za usporedbu url-a i definiranog url-a u ruti
  public static function matchRoute(string $url, Route $route): bool {
    $pattern = Router::buildPatternFromUrl($route->url);
    return preg_match($pattern, $url) === 1;
  }

  // za prepoznavanje s placeholderima
  private static function buildPatternFromUrl(string $url): string {
    return '#^' . preg_replace('#\{[^/]+\}#', '([^/]+)', $url) . '$#';
  }

  // vadi parametre iz requesta i vraća ih u stringu
  public static function dohvatiParametreReq(Request $request) : string {
    $ime = $request->getParameter('ime');
    $spol = $request->getParameter('spol');
    $dob = (int) $request->getParameter('dob');
    $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    return $content;
  }

    // za putanju "/"
    public static function default() : ResponseInterface{
      Router::$response = new Response(200, Router::dohvatiParametreReq(Router::$request));
      return Router::$response;
    }

  // za putanju "/osobe/{ime}
  public static function prikaziOsobu() : ResponseInterface{
    $url = $_SERVER['REQUEST_URI'];
    $pattern = Router::buildPatternFromUrl(Router::$route->url);
    Router::$response = new Response(200, "");
    if (preg_match($pattern, $url, $matches)) {
      $parametarIme = $matches[1];

      if (Router::$request->getParameter("ime") == $parametarIme) {
        Router::$response->setContent(Router::dohvatiParametreReq(Router::$request));
      } else {
        Router::$response->setStatusCode(404);
        Router::$response->setContent("Osoba ne postoji.");
      }
    }
    return Router::$response;
  }
}