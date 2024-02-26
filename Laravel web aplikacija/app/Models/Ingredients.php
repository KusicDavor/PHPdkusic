<?php

namespace App\Models;

use Database\Factories\IngredientsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\Factory;

class Ingredients extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected static function newFactory(): Factory
    {
        return IngredientsFactory::new();
    }
    protected $hidden = ['created_at', 'updated_at'];
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];

    public function meals() {
         return $this->belongsToMany(
             Meal::class,
             'meals_ingredients',
             'ingredient_id',
             'meal_id');
         }
}
