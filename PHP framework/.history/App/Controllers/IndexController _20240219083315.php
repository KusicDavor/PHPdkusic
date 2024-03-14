<?php
namespace Controllers;
use Http\Response;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;

class IndexController {
    public function indexAction($request) : ResponseInterface {
        $response = new Response(200, $content);
        $response->send();
        return $response;
    }

    public function indexJsonAction(array $data) : ResponseInterface {
        $data = ['data' => ['key' => 'value']];
        $response = new JsonResponse(200, $data);
        $response->send();
        return $response;
    }
}