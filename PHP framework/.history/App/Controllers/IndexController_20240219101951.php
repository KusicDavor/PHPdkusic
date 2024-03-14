<?php
namespace Controllers;
use Http\Response;
use Http\Request;
use Classes\JsonResponse;
use Interfaces\ResponseInterface;

class IndexController {
    public function indexAction(Request $request) : ResponseInterface {
        echo "index";
        $response = new Response(200, "");
        $response->send();
        return $response;
    }

    public function indexJsonAction(Request $request) : ResponseInterface {
        $data = ['data' => ['key' => 'value']];
        $response = new JsonResponse(200, $data);
        $response->send();
        return $response;
    }

    public function poruka(){
        echo "poruka";
    }
}