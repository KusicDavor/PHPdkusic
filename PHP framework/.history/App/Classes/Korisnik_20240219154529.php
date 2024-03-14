<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    public $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
}