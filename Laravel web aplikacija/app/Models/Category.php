<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\Factory;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected static function newFactory(): Factory
    {
        return CategoryFactory::new();
    }
    
    protected $hidden = ['created_at', 'updated_at'];
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];
}
