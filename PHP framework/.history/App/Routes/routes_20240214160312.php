<?php
namespace Routes;
use Http\Router;
use Classes\Route;

$router = new Router();

$router->addRoute('GET', '/blogs', function () {
    echo "My route is working!";
    exit;
});

$router->addRoute('GET', '/', function () {
    Router
    exit;
});

public function handleRequest(Request $request)
{
  $ime = $request->getParam('ime');
  $spol = $request->getParam('spol');
  $dob = $request->getParam('dob');
  $httpKod = 200;

  if ($spol == "M") {
    $spol = "Muškarac";
  }

  if ($dob < 18) {
    $poruka = "Osoba je maloljetna. Nije moguće obraditi osobu.";
    $httpKod = 409;
  } else {
    $poruka = "Osoba: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
    $httpKod = 201;
  }
  $this->vratiPoruku($poruka, $httpKod);
}

$router->matchRoute();