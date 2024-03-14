<?php

namespace App\Models;

use Database\Factories\MealFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected static function newFactory(): Factory
    {
        return MealFactory::new();
    }

    protected $touches = ['tags', 'category', 'ingredients'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'category_id'];

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
       //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
       return $this->belongsToMany(
            Tags::class,
            'meals_tags',
            'meal_id',
            'tag_id');
    }

    public function ingredients()
    {
       //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
       return $this->belongsToMany(
            Ingredients::class,
            'meals_ingredients',
            'meal_id',
            'ingredient_id');
    }
}