<?php
namespace Controllers;

class IndexController {
    public function __construct() {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $twig->render('poruka.html.twig', ['poruka' => $content]);
    }
}

}