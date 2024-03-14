<?php
namespace Http;
use Classes\Route;
use Interfaces\RequestInterface;
use Interfaces\ResponseInterface;
class Router {
  private static $routes = [];
  private static $request;
  public function addRoutes(array $routes) {
    Router::$routes = $routes;
  }

  public function handlePOSTRequest(Request $request) {
    Router::$request = $request;
    $url =$_SERVER['REQUEST_URI'];
    $method = $_SERVER["REQUEST_METHOD"];
    foreach (Router::$routes as $route) {
      if ($route->url === $url && $route->method === $method) {
          $callback = $route->callback;
          if (is_callable($callback)) {
              return call_user_func($callback, $request);
          } else {
              echo "Metoda nije pronađena";
          }
      }
    }
  }

  public function handleGETRequest(Request $request) {
    // $url =$_SERVER['REQUEST_URI'];
    // $method = $_SERVER["REQUEST_METHOD"];
    // echo $url ." ----------- " . $method . " --------------- ";
    // var_dump(Router::$routes);
    // var_dump($request);
    // foreach (Router::$routes as $route) {
    //   if ($route->url === $url && $route->method === $method) {
    //       $callback = $route->callback;
    //       if (is_callable($callback)) {
    //           return call_user_func($callback, $request);
    //       } else {
    //           echo "Metoda nije pronađena";
    //       }
    //   }
    // }
  }

  public static function obradiPOST() : ResponseInterface {
    $response = new Response(300, Router::$request->getParameter;
    $response->send();
    return $response;
  }

  //   public function handleRequest(Request $request)
  //   {
  //     $ime = $request->getParam('ime');
  //     $spol = $request->getParam('spol');
  //     $dob = $request->getParam('dob');
  //     $httpKod = 200;

  //     if ($spol == "M") {
  //       $spol = "Muškarac";
  //     }

  //     if ($dob < 18) {
  //       $poruka = "Osoba je maloljetna. Nije moguće obraditi osobu.";
  //       $httpKod = 409;
  //     } else {
  //       $poruka = "Osoba: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
  //       $httpKod = 201;
  //     }
  //     $this->vratiPoruku($poruka, $httpKod);
  // }
  // private function vratiPoruku($poruka, $httpKod) {
  //   $htmlContent = file_get_contents('Resources/views/poruka.html');
  //   $htmlContent = str_replace('$poruka', "<p>$poruka</p>", $htmlContent);
  //   $response = new Response($httpKod, $htmlContent, "text/html");
  //   return $response->send();
  // }
}