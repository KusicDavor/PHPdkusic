<?php
namespace Http;
use Interfaces\ResponseInterface;
use Classes\Route;
class Router {
  private static $routes = [];
  $ime = "";
  $spol = "";
  $dob = 0;
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  private function srediRequest() {
    $ime = Router::$request->getParameter('ime');
    $spol = Router::$request->getParameter('spol');
    $dob = Router::$request->getParameter('dob');
  }

  public function handleRequest(Request $request) {
    Router::$request = $request;
    $url =$_SERVER['REQUEST_URI'];
    $method = $_SERVER["REQUEST_METHOD"];
    foreach (Router::$routes as $route) {
      if ($this->isVariableUrl($route->url)) {
      $pattern = $this->buildPatternFromUrl($route->url);
      if (preg_match($pattern, $url)) {
        call_user_func($route->callback);
        return;
      }
    } else {
      if ($route->url === $url && $route->method === $method) {
          $callback = $route->callback;
          if (is_callable($callback)) {
              return call_user_func($callback, $request);
          } else {
            $content = "Stranica ne postoji.";
            $response = new Response(404, $content);
            $response->send();
            return $response;
          }
      }
    }
  }
}

  private function isVariableUrl(string $url): bool {
    return strpos($url, '{') !== false && strpos($url, '}') !== false;
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
    $content = "tu sam11";
    var_dump(Router::$request);
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