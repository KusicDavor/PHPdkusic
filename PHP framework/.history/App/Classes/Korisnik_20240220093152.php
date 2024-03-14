<?php 
namespace Classes;
use Database\Model;
use Classes\Timestamp;
class Korisnik extends Model {
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
}