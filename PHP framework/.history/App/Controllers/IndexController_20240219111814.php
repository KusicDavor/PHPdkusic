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
        $array = [$ime, $spol, $dob];
        var_dump($request);


        echo json_encode($array);
        return new Response(200, "#");


        //$response = new JsonResponse(200, $data);
        // $response->send();
        // return $response;
    }
}