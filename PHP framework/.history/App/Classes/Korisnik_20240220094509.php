<?php 
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    use Timestamp;
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public static function __callStatic($method, $arguments) {
        if ($method === 'createTimestampColumns' && in_array(Timestamp::class, class_uses(static::class))) {
            Timestamp::createTimestampColumns();
        }
    }
}