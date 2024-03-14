<?php 
namespace Classes;
use Database\Model;
use Classes\TimestampTrait;
class Korisnik extends Model {
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
}