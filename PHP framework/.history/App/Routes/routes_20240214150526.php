# <?php
// # namespace Routes;
// # use Http\Router;
// # use Http\Request;
// # use Classes\Route;

// # $r = new Router();
// # $routes = [];

// # $r->route('/', function () {
// #     $request = new Request($_REQUEST);
// #     if ($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER['REQUEST_URI'] == "/") {
// #         include 'Resources/views/index.html';
// #     } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
// #         $r1 = new Router();
// #         $r1->handleRequest($request);
// #     }
// # });

// # $r->route('/login', function () {
// #     if ($_SERVER["REQUEST_METHOD"] == "GET") {
// #     echo "Login:";
// #     }
// # });

// # foreach ($routes as $path => $callback) {
// #     $routes[$path] = $callback;
// # }

index:
    path:       /
    controller: App\Http\Router::show
    methods:    GET

index:
    path:       /
    controller: App\Http\Router::load
    methods:    POST

login:
    path:       /login
    controller: App\Http\Router::login
    methods:    GET