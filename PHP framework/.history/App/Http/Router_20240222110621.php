<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  public static $routes = [];
  public static $route;
  public static $response;

  // metoda za dodavanje nove rute
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  // metoda za resolvanje rute 
  public static function handleRequest() : ResponseInterface {
    Router::$response = new Response(200, "");
    $request = new Request($_REQUEST);

    $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
    $url = $parsedUrl['path'];
    $method = $_SERVER["REQUEST_METHOD"];

    $postoji = 0;
    $putData = file_get_contents("php://input");
    $data = json_decode($putData, true);
    var_dump($data);

    foreach (Router::$routes as $route) {
      if (Router::matchRoute($url, $route) && $route->method === $method) {
        Router::$route = $route;
        if(is_callable($route->callback)) {
          
          $postoji = 1;
          return call_user_func($route->callback, $request);
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

  // za usporedbu primljenog url-a i url-a u ruti
  public static function matchRoute(string $url, Route $route): bool {
    $pattern = Router::buildPatternFromUrl($route->url);
    return preg_match($pattern, $url) === 1;
  }

  // za prepoznavanje s placeholderima
  public static function buildPatternFromUrl(string $url): string {
    return '#^' . preg_replace('#\{[^/]+\}#', '([^/]+)', $url) . '$#';
  }
}