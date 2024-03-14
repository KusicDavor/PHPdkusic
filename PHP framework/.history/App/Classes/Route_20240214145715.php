<?php
namespace Classes;
class Route {
    public function send(int $statusCode, string $content, string $contentType = 'text/html')
    {
        header("Content-Type: $contentType; charset=utf-8");
        http_response_code($statusCode);
        echo $content;
    }
}