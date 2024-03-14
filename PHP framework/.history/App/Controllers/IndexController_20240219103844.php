<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;
use Http\Router;

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        parse_str($request->getParameter("query"), $requestGET);
        $request = new Request($requestGET);
        $response = new Response(200, Router::dohvatiParametreReq($request));
        $response->send();
        return $response;
    }

    public static function indexJsonAction(Request $request) : ResponseInterface {
        echo json_encode($request);
        return new Response(200, "#");
        //$data = ['data' => ['key' => 'value']];
        //$response = new JsonResponse(200, $data);
        // $response->send();
        // return $response;
    }
}