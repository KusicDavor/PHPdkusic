<?php
require 'vendor/autoload.php';
use Http\Request;

$parameters = [];
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $parameters[$key] = $value;
    }
}
  
