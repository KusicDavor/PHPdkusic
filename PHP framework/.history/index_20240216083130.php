<?php
require 'vendor/autoload.php';
use Http\Request;

$request1 = new Request('POST', 'http://example.com/api');
$request->send();

$router->matchRoute();