<?php
namespace Controllers;

class IndexController {
    public function __construct() {
        $this->view = new View();
    }
}

public static function indexAction(Request $request) : ResponseInterface {
    $loader = new FilesystemLoader('Resources/views/');
    $twig = new Environment($loader);

    $response = new Response(200, "");
    $content = Router::dohvatiParametreReq($request);
    $htmlContent = $twig->render('poruka.html.twig', ['poruka' => $content]);
    $response->setContent($htmlContent);
    return $response;
}