<?php
namespace Http;
use Classes\Route;
use Interfaces\ResponseInterface;
class Router {
  private $routes = [];
  private $request;
  public function acceptRequest(Request $request) {
    $this->request = $request;
}

  public function addRoute(Route $route) {
    $this->routes[] = $route;
    var_dump($this->routes);
  }

    public static function handleRequest() {
      // foreach ($this->routes as $route) {
      //   echo $route->url;
      //     if ($route->url === $request->getParameter('url') && $route->method === $request->getParameter('method')) {
      //         $callback = $route->callback;
      //         // Execute the callback function associated with the matched route
      //         if (is_callable($callback)) {
      //             call_user_func($callback);
      //         } else {
      //             // Handle case where callback is not callable
      //             echo "Callback for route is not callable.";
      //         }
      //         return; // Exit loop after handling the request
      //     }
      // }

      // If no matching route found
      //echo "404 - Route not found.";
  }

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