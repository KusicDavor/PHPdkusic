<?php
require 'vendor/autoload.php';
use Http\Request;

$ime = "DK";
$spol = "M";
$dob = 22;

$req = [$ime, $spol, $dob];

$request = new Request('POST', );
$request->send();

$router->matchRoute();