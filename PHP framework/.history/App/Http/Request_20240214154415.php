<?php
namespace Http;
use Interfaces\RequestInterface;
class Request implements RequestInterface {
    private $params;
    public static function login() {
        echo "tu sam";
    }
   
    public function __construct($params)
    {
        $this->params = $params;
    }
   
    public function getParam($key)
    {
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

       public function getQueryParams()
    {
        return $this->$_REQUEST;
    }
}