<?php
use Database\Model;
class Korisnik extends Model {
    protected $table = 'korisnici';

    public $ime;
    public $spol;
    public $dob;

    // You can define additional properties or methods specific to the User model here
}