<?php 
namespace Classes;
use Database\Model;
use TimestampTr
class Korisnik extends Model {
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;
}