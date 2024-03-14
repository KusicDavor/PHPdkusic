<?php
namespace Classes;
use Database\Model;
class Korisnik extends Model {
    private trait TraitName
    {
        public static function setTimestamp($model) {
            $model->attributes['created_at'] = $model->freshTimestamp();
            $model->attributes['updated_at'] = $model->freshTimestamp();
    }

    public static function updateTimestamp($model) {
        $model->attributes['updated_at'] = $model->freshTimestamp();
}

    public function freshTimestamp() {
        return date('Y-m-d H:i:s');
    }
    }
    
    protected $table = 'korisnici';
    public $ime;
    public $spol;
    public $dob;

    public function __construct(string $ime, string $spol, int $dob, ?int $id = null) {

        if (in_array(TimestampCreated::class, class_uses('Korisnik'))) {
            echo "Korisnik uses TimestampCreated.";
        } else {
            echo "Korisnik does not use TimestampCreated.";
        }

        $this->attributes= [
                'ime' => $ime,
                'spol' => $spol,
                'dob' => $dob
             ];

        if ($id !== null) {
            $this->attributes['id'] = $id;
            TimestampCreated::updateTimestamp($this);
        } else {
            TimestampCreated::setTimestamp($this);
        }
    }
}