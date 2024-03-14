<?php
  require_once 'routes.php';
class Router {
  public $routes = [];

  public function route($path, $callback, $method = 'GET') {
    $this->routes[$path] = ['callback' => $callback, 'method' => $method];
}

public function handleRequest1($request) {
    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    // Check if a route exists for the requested URI and method
    if (isset($this->routes[$uri]) && $this->routes[$uri]['method'] === $method) {
        $callback = $this->routes[$uri]['callback'];
        call_user_func($callback);
    } else {
        // Route not found, display 404 error page
        $this->handleNotFound();
    }
}

  public function handleNotFound() {
      // Set the HTTP response code to 404
      http_response_code(404);
      // Display the 404 error page
      echo "Page not found";
  }

  public function handleRequest1(Request $request)
    {
      $method = $_SERVER['REQUEST_METHOD'];
      $path = trim($_SERVER['REQUEST_URI'], '/');
      $ime = $request->getParam('ime');
      $spol = $request->getParam('spol');
      $dob = $request->getParam('dob');
      echo "method: $method, path: $path -------------- <br>";
      echo "ime: $ime, Age: $spol, Dob: $dob ----------------- <br>";
      echo $request->getQueryParams();
  }
}