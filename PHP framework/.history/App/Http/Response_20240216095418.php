<?php
namespace Http;
use Interfaces\ResponseInterface;
class Response implements ResponseInterface {
    public int $statusCode;
    public string $content;
    public string $contentType = 'text/html';
    public function __construct(int $statusCode, string $content, string $contentType = 'text/html') {
        $this->statusCode = $statusCode;
        $this->content = $content;
        $this->contentType = $contentType;
    }
}