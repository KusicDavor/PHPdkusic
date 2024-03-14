<?php
namespace Http;
use Classes\Route;
use Interfaces\RequestInterface;
use Interfaces\ResponseInterface;
class Router {
  private $routes = [];
  private $request;
  public function acceptRequest(Request $request) {
    $this->request = $request;
    $this->handleRequest();
}

  public function addRoute(Route $route) {
    $this->routes[] = $route;
  }

    public function handleRequest() : ResponseInterface {
      $url =$_SERVER['REQUEST_URI'];
      $method = $_SERVER["REQUEST_METHOD"];
      $response = new Response($statusCode, $content);
      return new Response(300, "tu sam", "text/html");
    }

    //     foreach ($this->routes as $route) {
    //         if ($route->url === $this->request->getUri()->getPath() && $route->method === $this->request->getMethod()) {
    //             $callback = $route->callback;
    //             // Execute the callback function associated with the matched route
    //             if (is_callable($callback)) {
    //                 return call_user_func($callback, $this->request);
    //             } else {
    //                 // Handle case where callback is not callable
    //                 echo "Callback for route is not callable.";
    //             }
    //         }
    //     }

    //     // If no matching route found, return 404 response
    //     return new Response(404, "404 - Route not found.");
    // }
      

    // public static function handle(Request $request) {
    //   $htmlContent = file_get_contents('Resources/views/poruka.html');
    //   $htmlContent = str_replace('$poruka', "<p>poruka</p>", $htmlContent);
    //   $response = new Response(200, $htmlContent, "text/html");
    //   return $response->send();
    // }

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