<?php
use 
,global $routes;
$routes = [];
$route = new Route('GET', '/login', Router::handle());