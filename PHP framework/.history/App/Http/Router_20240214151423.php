<?php
namespace Http;
use Classes\Route;
class Router {

  public static function loadRoutesFromYaml(string $yamlFile): array
  {
      // Parse the YAML file to extract route definitions
      $routes = yaml_parse_file($yamlFile);

      // Initialize an array to store Route objects
      $routes = [];

      // Iterate over each route definition
      foreach ($routes as $routeName => $routeData) {
          // Extract route properties from the YAML data
          $method = strtoupper($routeData['methods']); // Convert method to uppercase
          $path = $routeData['path'];
          $controller = $routeData['controller'];

          // Create a new Route object and add it to the array
          $routeObjects[] = new Route($method, $path, $controller);
      }

      return $routeObjects;
  }

  public function show()
    {
        // Logic for handling the "GET /" route
    }

    public function load()
    {
        // Logic for handling the "POST /" route
    }

    public function login()
    {
        // Logic for handling the "GET /login" route
    }

  public function handleRequest(Request $request)
    {
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');
      $httpKod = 200;

      if ($spol == "M") {
        $spol = "Muškarac";
      }

      if ($dob < 18) {
        $poruka = "Osoba je maloljetna. Nije moguće obraditi osobu.";
        $httpKod = 409;
      } else {
        $poruka = "Osoba: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
        $httpKod = 201;
      }
      $this->vratiPoruku($poruka, $httpKod);
  }

  private function vratiPoruku($poruka, $httpKod) {
    $response = new Response();
    $htmlContent = file_get_contents('Resources/views/poruka.html');
    $htmlContent = str_replace('$poruka', "<p>$poruka</p>", $htmlContent);
    return $response->send($httpKod, $htmlContent, "text/html");
  }
}