<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Interfaces\ResponseInterface;
use Http\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        $loader = new FilesystemLoader('Resources/views/');
        $twig = new Environment($loader);

        $response = new Response(200, "");
        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => 'OVO JE PORUKA ZA TWIG TEMPLATE STRANICU']);
        $response->setContent(Router::dohvatiParametreReq($request));
        return $response;
    }

    public static function indexJsonAction(Request $request) {
        $parameters = $request->toArray();
        $parameters['dob'] = (int) $parameters['dob'];
        $content = json_encode($parameters, JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }
}