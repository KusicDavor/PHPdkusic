<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$foo_route = new Route(
    '/foo',
    array('controller' => 'FooController')
  );

  // Add Route object(s) to RouteCollection object 
  $routes = new RouteCollection();
  $routes->add('foo_route', $foo_route);
  $routes->add('foo_placeholder_route', $foo_placeholder_route);