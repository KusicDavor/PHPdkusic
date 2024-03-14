<?php
namespace Interfaces;
interface ResponseInterface {
    public function send(int $statusCode, string $content, string $contentType = 'text/html');
}