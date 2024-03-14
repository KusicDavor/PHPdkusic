<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  public static $routes = [];
  public static $route;
  public static $request;
  public static $response;

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
      $pattern = str_replace('{id}', '(\d+)', $route);
            $pattern = str_replace('/', '\/', $pattern);
            if (preg_match("/^$pattern$/", $url, $matches)) {
                array_shift($matches); // Remove the full match
                $controller = new $handler['controller'];
                $method = $handler['method'];
                call_user_func_array([$controller, $method], $matches);
                return;
            }
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