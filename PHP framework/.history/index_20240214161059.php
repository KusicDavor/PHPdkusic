<?php
require 'vendor/autoload.php';
require 'App/Routes/routes.php';
use Http\Router;
$router = new Router();


$router->matchRoute();