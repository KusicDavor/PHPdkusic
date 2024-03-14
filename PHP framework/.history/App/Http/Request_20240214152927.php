<?php
namespace Http;
use Interfaces\RequestInterface;
class Request implements RequestInterface {
    public function getBody()
    {
      if($this->requestMethod === "GET")
      {
        return;
      }
  
  
      if ($this->requestMethod == "POST")
      {
  
        $body = array();
        foreach($_POST as $key => $value)
        {
          $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
  
        return $body;
      }
    }
}