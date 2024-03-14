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

   // Init RequestContext object 
   $context = new RequestContext();
   $context->fromRequest(Request::createFromGlobals());

   // Init UrlMatcher object 
   $matcher = new UrlMatcher($routes, $context);

   // Find the current route 
   $parameters = $matcher->match($context->getPathInfo());