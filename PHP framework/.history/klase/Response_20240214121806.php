<?php
namespace App;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    public function send(int $statusCode, string $content, string $contentType = 'text/html')
    {
        http_response_code($statusCode);
        header("Content-Type: $contentType");
        echo $content;
    }
    header('Content-Type: text/html; charset=utf-8');
}