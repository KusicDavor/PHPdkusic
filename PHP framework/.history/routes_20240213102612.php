<?php
$router = new Router();
$router->addRoute('GET', '/about', function ($request) {
    $ime = $request->getParam('ime');
    $spol = $request->getParam('spol');
    $dob = $request->getParam('dob');
    echo "ime: $ime, Age: $spol, Dob: $dob ----------------- ";
});

?>