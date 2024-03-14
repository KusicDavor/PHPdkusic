<?php
interface RequestInterface {
    public $ime;
    public $spol;
    public $grad;
    public function getIme();
    public function getSpol();
    public function getGrad();
}
