<?php
include_once 'Router.php';
echo 'fy';
$router = new Router();
$router->addRoute('GET', '/home', function ($request) {
        echo 'ja';
});
