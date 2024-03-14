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

    public function setStatusCode(int $statusCode): void {
        $this->statusCode = $statusCode;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }
    public function send()
    {
        http_response_code($this->statusCode);
        echo $this->content;
    }
}