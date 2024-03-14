<?php
   class Request
   {
       private $params;
   
       public function __construct($params)
       {
           $this->params = $params;
       }
   
       public function getParam($key)
       {
           return isset($this->params[$key]) ? $this->params[$key] : null;
       }
   }