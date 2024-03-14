<?php
require 'vendor/autoload.php';
use Http\Request;

$request = new Request('POST', 'http://example./api');
$request->send();

$router->matchRoute();