<?php
include_once 'Router.php';
$router = new Router();
$router->addRoute('GET', '/home', function ($request) {
        echo 'ja';
});

function def() {
    echo "tu sam";
}
