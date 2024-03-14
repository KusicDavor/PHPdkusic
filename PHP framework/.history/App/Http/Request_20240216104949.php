<?php
namespace Http;
use Interfaces\RequestInterface;
use App\Ht
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

    public function send() {
        $router = new Router();
        $router->acceptRequest($this);
    }
}