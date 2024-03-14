<?php
namespace Interfaces;
interface RequestInterface {
    public function setParameter($key, $value);
    public function getParameter($key)
}