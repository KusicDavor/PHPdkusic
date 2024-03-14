<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;
use Http\Router;

class IndexController {
    public static function indexAction(Request $request) : ResponseInterface {
        $req = $request; 
        $response = new Response(200, "");
        if ($request->getParameter("method") == "GET") {
            parse_str($request->getParameter("query"), $requestGET);
            $requestGET = new Request($requestGET);
            $response 
            $response->setContent(Router::dohvatiParametreReq($requestGET));
        }
        $response = new Response(200, Router::dohvatiParametreReq($req));
        $response->send();
        return $response;
    }

    public static function indexJsonAction(Request $request) : ResponseInterface {
        var_dump($request);

        $data = ['data' => ['key' => 'value']];
        echo json_encode($data);
        return new Response(200, "#");


        //$response = new JsonResponse(200, $data);
        // $response->send();
        // return $response;
    }
}