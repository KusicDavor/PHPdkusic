<?php
namespace Controllers;
use Classes\JsonResponse;

class indexController {
    public function indexAction() {
        // Your logic for generating the normal response
        return new Response(200, 'Normal response content');
    }
}