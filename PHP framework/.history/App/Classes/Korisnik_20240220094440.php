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
        if ($method === 'createTimestampColumns' && in_array(Timestampable::class, class_uses(static::class))) {
            Timestampable::createTimestampColumns();
        } else {
            throw new \BadMethodCallException("Static method $method does not exist");
        }
    }
}