<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    public $ime;
    public $spol;
    public $dob;
    public function __construct($ime, $spol, $dob) {
        $this->ime = $ime;
        $this->spol = $spol;
        $this->dob = $dob;
    }
}