<?php
$router = new Router();
$router->addRoute('GET', '/home', function ($request) {
        echo 'ja';
});
