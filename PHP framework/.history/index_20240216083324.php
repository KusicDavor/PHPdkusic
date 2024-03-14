<?php
require 'vendor/autoload.php';
use Http\Request;

$u
$request = new Request('POST', '');
$request->send();

$router->matchRoute();