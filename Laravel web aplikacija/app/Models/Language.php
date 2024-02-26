<?php

namespace App\Models;

use Database\Factories\LanguageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Language extends Model
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return LanguageFactory::new();
    }

    protected $table = 'languages';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['lang'];
}