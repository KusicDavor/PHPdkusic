<?php
namespace Controllers;
use Interfaces\ResponseInterface;
use Http\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class IndexController {
    public function index() {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $twig->render('poruka.html.twig', ['poruka' => $content]);
    }
}