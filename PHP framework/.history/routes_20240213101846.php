require_once 'Router.php';
<?php

$router->addRoute('GET', '/about', function ($request) {
    return 'About Us';
});

?>