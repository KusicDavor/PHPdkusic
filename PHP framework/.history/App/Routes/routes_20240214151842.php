<?php
namespace Routes;
use Http\Router;
use Http\Request;
use Classes\Route;

$r = new Router();
$routes = [];

return function (RoutingConfigurator $routes): void {
    $routes->add('blog_list', '/blog')
        // the controller value has the format [controller_class, method_name]
        ->controller([BlogController::class, 'list'])
        
$r->route('/login', function () {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Login:";
    }
});