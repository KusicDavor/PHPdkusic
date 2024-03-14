<?php
namespace Http;
use Interfaces\ResponseInterface;
class Router {
  private static $routes = [];
  private static $request;
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  public function handleRequest(Request $request) {
    Router::$request = $request;
    $url =$_SERVER['REQUEST_URI'];
    $method = $_SERVER["REQUEST_METHOD"];
    foreach (Router::$routes as $route) {
      if ($route->url === $url && $route->method === $method) {
          $callback = $route->callback;
          if (is_callable($callback)) {
              return call_user_func($callback, $request);
          } else {
              echo "Metoda nije pronađena.";
          }
      }
    }
  }

  public function posalji(string $tekst) {
    echo $tekst;
  }

  public function index() {
    echo $tekst;
  }

  public static function obradiRequest() : ResponseInterface {
    // if (Router::$request->getParameter("method") == "GET") {
    //   $response = new Response(300, "ovo je GET");
    //   $response->send();
    //   return $response;
    // } else {
    $ime = Router::$request->getParameter('ime');
    $spol = Router::$request->getParameter('spol');
    $dob = Router::$request->getParameter('dob');
    $content = "Osoba: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    $response = new Response(200, $content);
    $response->send();
    return $response;
    }
}