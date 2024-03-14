<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use T;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
}