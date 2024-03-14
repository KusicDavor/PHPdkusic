<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function dodajKorisnika(){
        $korisnik = new Korisnik();
        $korisnik->attributes = [
            'ime' => 'DK',
            'spol' => 'M',
            'dob' => '22'
        ];
    }
}