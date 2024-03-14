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
        $router = new Router();
        if ($method === 'GET') {
            $this->setParameter('url', $this);
        }
        $router->handleRequest($this);
    }
}