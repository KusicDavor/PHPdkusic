<?php
namespace Controllers;
use Http\Response;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;

class IndexController {
    public function indexAction(string $content) : ResponseInterface {
        $
        // Your logic for generating the normal response
        return new Response(200, 'Normal response content');
    }

    public function indexJsonAction() : ResponseInterface {
        // Your logic for generating the JSON response
        $data = ['message' => 'Success', 'data' => ['key' => 'value']];
        return new JsonResponse(200, $data);
    }
}