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
        $content = json_encode($request->toArray(), JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $content,

        $response->send();
        return $response;
    }
}