<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;
use Http\Router;

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        $response = new Response(200, "");
        $response->setContent(Router::dohvatiParametreReq($request));
        $response->send();
        return $response;
    }

    public static function indexJsonAction(Request $request) : ResponseInterface {
        $ime = $request->getParameter('ime');
        $spol = $request->getParameter('spol');
        $dob = $request->getParameter('dob');
        $array = [$ime]
        var_dump($request);
        $array = Router::$request;
        echo json_encode($array);
        return new Response(200, "#");


        //$response = new JsonResponse(200, $data);
        // $response->send();
        // return $response;
    }
}