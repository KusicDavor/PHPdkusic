<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  private static $routes = [];
  private static $request;
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  public function handleRequest(Request $request) {
    Router::$request = $request;
    foreach ($this->routes as $route) {
      $url = $_SERVER['REQUEST_URI'];
      $method = $_SERVER['REQUEST_METHOD'];
        if ($this->matchRoute($url, $route) && $route->method === $method) {
              // If they match, call the handler function
              call_user_func($route->callback);
              return;
          }
      }
      // If no route matches, return a 404 response
      http_response_code(404);
      echo "Not Found";
    }

  public function matchRoute(string $url, Route $route): bool {
    $pattern = $this->buildPatternFromUrl($route->url);
    return preg_match($pattern, $url) === 1;
  }

  private function buildPatternFromUrl(string $url): string {
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
    $routePattern = '/osobe/{ime}';
    $url = $_SERVER['REQUEST_URI'];
    echo $routePattern .' ---- '. $url .' ------ <br>';

    $matches = [];
    if (preg_match('#' . preg_quote($routePattern, '#') . '#', $url, $matches)) {
        $variableParameter = $matches[1];
        $content = "Variable parameter: $variableParameter";
    } else {
        $content = "No match found";
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