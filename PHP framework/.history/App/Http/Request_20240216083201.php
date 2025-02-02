<?php
namespace Http;
use Interfaces\RequestInterface;
class Request implements RequestInterface {
    private $parameters;

    public function __construct($method, $url, $parameters = []) {
        $this->method = $method;
        $this->url = $url;
        $this->parameters = $parameters;
    }

    public function setParameter($key, $value) {
        $this->parameters[$key] = $value;
    }

    public function getParameter($key) {
        return $this->parameters[$key] ?? null;
    }

    public function send() {
        // Here you would handle sending the request, for example making a HTTP request
        // You can access method, url, and parameters to construct your request
        echo "Sending $this->method request to $this->url with parameters: ";
        print_r($this->parameters);
    }
}