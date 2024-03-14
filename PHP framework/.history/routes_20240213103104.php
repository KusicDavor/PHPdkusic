<?php
$router = new Router();
$router->addRoute('POST', '/about', function ($request) {
    $ime = $request->getParam('ime');
    $spol = $request->getParam('spol');
    $dob = $request->getParam('dob');
    echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
});