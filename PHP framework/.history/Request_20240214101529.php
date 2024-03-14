<?php
class Request implements RequestInterface {
    private $params;
   
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