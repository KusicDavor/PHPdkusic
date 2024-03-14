<?php
namespace Controllers;
use Http\Response;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;

class IndexController {
    public function indexAction(string $content) : ResponseInterface {
        $response = new Response(200, $content);
        $response->send();
        return $response;
    }

    public function indexJsonAction(array $data) : ResponseInterface {
        
        $data = ['message' => 'Success', 'data' => ['key' => 'value']];
        return new JsonResponse(200, $data);
    }
}