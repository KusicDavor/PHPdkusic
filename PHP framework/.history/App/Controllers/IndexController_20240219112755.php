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
        echo "tu sam";
        return $response;
    }

    public static function indexJsonAction(Request $request) {
        $content = json_encode($request->toArray(), JSON_PRETTY_PRINT);
        $response = new Response(200, $content, "application/json");
        return $response;
    }
}