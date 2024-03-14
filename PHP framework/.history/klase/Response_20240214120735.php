<?php
namespace App;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    
    public static function send(int $statusCode, string $content, string $contentType = 'text/html')
    {
        http_response_code($statusCode);
        header("Content-Type: $contentType");
            echo $content;
        }
    
}