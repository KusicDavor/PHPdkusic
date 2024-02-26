<?php

namespace App\Models;

use Database\Factories\TagsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\Factory;

class Tags extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected static function newFactory(): Factory
    {
        return TagsFactory::new();
    }
    
    protected $hidden = ['created_at', 'updated_at'];
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];

    public function meals() {
   //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
    return $this->belongsToMany(
        Meal::class,
        'meals_tags',
        'tag_id',
        'meal_id');
    }
}
