<?php
namespace Http;
use Classes\Route;
use Interfaces\RequestInterface;
use Interfaces\ResponseInterface;
class Router {
  private $routes = [];
  private static $request;
  public function acceptRequest(Request $request) {
    $this->handleRequest();
  }

  public function addRoute(Route $route) {
    $this->routes[] = $route;
    var_dump($this->routes);
  }

  public function handleRequest(Request $request) {
    $url =$_SERVER['REQUEST_URI'];
    $method = $_SERVER["REQUEST_METHOD"];

    var_dump($request);
    var_dump($this->routes);

    echo "tu sam";
    //foreach ($this->routes as $route) {
      // if ($route->url === $url && $route->method === $method) {
      //   echo "postoji";
      //     $callback = $route->callback;
      //     if (is_callable($callback)) {
      //         return call_user_func($callback, $this->request);
      //     } else {
      //         echo "Callback for route is not callable.";
      //     }
      // }
    // }
  }

    public static function handle() : ResponseInterface{
      $htmlContent = file_get_contents('Resources/views/poruka.html');
      $htmlContent = str_replace('$poruka', "<p>poruka</p>", $htmlContent);
      $response = new Response(300, "tu sam");
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