<?php
require 'vendor/autoload.php';
use Controllers\IndexController;
use Controllers\UserController;
use Database\Connection;
use Classes\User;


$connection = Connection::getInstance();
$connection->connect();

