<?php
require 'vendor/autoload.php';
use Http\Router;


$router = new Router($routes);
$router->matchRoute();