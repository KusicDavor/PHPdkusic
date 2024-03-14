<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Http\Request;
use Http\Response;

class TwigController {
    public function twigRender(Request $request) {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);
        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => 'OVO JE PORUKA ZA TWIG TEMPLATE STRANICU']);
        return new Response(200, $htmlContent, 'text/html');
    }
}