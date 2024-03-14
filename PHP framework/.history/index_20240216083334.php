<?php
require 'vendor/autoload.php';
use Http\Request;

$ime = "DK";
$spol = "M"
$request = new Request('POST', '');
$request->send();

$router->matchRoute();