<?php
namespace App;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    private $params;
    public function __construct($params)
    {
        $this->params = $params;
    }
    public function send() {
        return $this->response;
    }
}