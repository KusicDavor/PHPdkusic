<?php
require 'vendor/autoload.php';
use Http\Request;

$request = new Request('POST', '');
$request->send();

$router->matchRoute();