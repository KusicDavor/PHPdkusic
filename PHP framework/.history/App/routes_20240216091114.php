<?php
use Classes\Route;
use Http\Request;
use Http\Router;

$router = new Router();

$request = new Request();


$route = new Route('GET', '/login', Router::handleRequest($request));
$router -> addRoute($route);