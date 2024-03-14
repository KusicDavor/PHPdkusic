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
        $content = Router::dohvatiParametreReq($request);
        $htmlContent = $twig->render('poruka.html.twig', ['poruka' => $content]);
        $response->setContent($htmlContent);
        return $response;
    }

    public static function indexJsonAction(Request $request) : ResponseInterface {
        $parameters = $request->toArray();
        $parameters['dob'] = (int) $parameters['dob'];
        $content = json_encode($parameters, JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }

    public static function dohvatiParametreReq(Request $request) : string {
        $ime = $request->getParameter('ime');
        $spol = $request->getParameter('spol');
        $dob = (int) $request->getParameter('dob');
        $content = "Ime: $ime<br>Spol: $spol<br>Dob: $dob<br>Osoba uspješno obrađena.";
        return $content;
      }
}