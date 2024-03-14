<?php
namespace Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class KorisnikController {
    public static function index() {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);

        $response = new Response(200, "");
        $content = Router::dohvatiParametreReq($request);
        $htmlContent = $twig->render('kreiranje.html.twig');
        $response->setContent($htmlContent);
        return $response;
    }
}