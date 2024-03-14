<?php
$router = new Router();
$router->addRoute('GET', '/about', function ($def) {
    echo "ime:";
});