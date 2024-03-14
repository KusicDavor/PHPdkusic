<?php
class Korisnik {
    public $ime;
    public $spol;
    public $dob;

    public function __construct($parameters) {
        $this->ime = $parameters['ime'];
        $this->spol = $parameters['spol'];
        $this->dob = $parameters['dob'];
    }
}
