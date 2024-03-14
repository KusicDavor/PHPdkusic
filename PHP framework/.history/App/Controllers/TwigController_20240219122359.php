<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Request;
use Http\Response;

class TwigController {
    public static function twigRender() {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => 'OVO JE PORUKA ZA TWIG TEMPLATE STRANICU']);
        return new Response(350, $htmlContent, 'text/html');
    }
}