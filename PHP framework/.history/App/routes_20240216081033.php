<?php
use App\Http\
,global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle());