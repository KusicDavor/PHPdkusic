<?php
namespace App;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    public function __construct($params)
    {
        $this->params = $params;
    }
    public function send() {
        return 
    }
}