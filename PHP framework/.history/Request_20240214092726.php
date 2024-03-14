<?php
require_once 'RequestInterface.php';
class Request implements RequestInterface {
    private $params;
   
    public function __construct($params)
    {
        print_r($params);
        $this->params = $params;
    }
   
    public function getParam($key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }
}