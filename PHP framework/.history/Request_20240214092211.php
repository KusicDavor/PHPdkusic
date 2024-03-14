<?php
require_once 'RequestInterface.php';
class Request implements RequestInterface {
    private $params;
   
    public function __construct($params)
    {
        $this->params = $params;
    }
   
    public function getParam($key)
    {
        $request = new Request(['ime' => $_POST['name'], 'spol' => $_POST['spol'], 'dob' => $_POST['dob']]);
        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

       public function getQueryParams()
    {
        return $this->$_REQUEST;
    }
}