<?php
namespace App;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    private $response;
    public function __construct($params)
    {
        $this->response = $params;
    }
    public function send() {
       $this->response;
    }
}