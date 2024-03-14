require_once 'Router.php';
<?php
$router = new Router();
$router->addRoute('GET', '/about', function ($request) {
    return 'About Us';
});

?>