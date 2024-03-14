<?php
namespace Http;
use Interfaces\RequestInterface;
use Http\Router;
class Request implements RequestInterface {
    private $parameters;

    public function __construct($parameters = []) {
        $this->parameters = $parameters;
    }

    public function setParameter($key, $value) {
        $this->parameters[$key] = $value;
    }

    public function getParameter($key) {
        return $this->parameters[$key] ?? null;
    }

    public function send($method = 'GET') {
        $response = Router::handleRequest($this);
        $response->send();
        return $response;
    }

    public function toArray() {
        $array = $this->parameters;
        // Explicitly cast integer values to integers
        foreach ($array as $key => $value) {
            if (is_int($value)) {
                $array[$key] = (int) $value;
            }
        }
        return $array;
    }
}