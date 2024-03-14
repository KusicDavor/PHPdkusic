<?php
$router = new Router();
$router->addRoute('GET', '/home', function ($def) {
        echo 'ja';
});

function def() {
    echo "tu sam";
}
