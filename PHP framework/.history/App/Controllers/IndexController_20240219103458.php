<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;
use 

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        parse_str($request->getParameter("query"), $requestGET);

        var_dump($requestGET);
        $response = new Response(200, Router::dohvatiParametreReq($requestGET));
        $response->send();
        return $response;
    }

    public static function indexJsonAction(Request $request) : ResponseInterface {
        $data = ['data' => ['key' => 'value']];
        $response = new JsonResponse(200, $data);
        $response->send();
        return $response;
    }
}