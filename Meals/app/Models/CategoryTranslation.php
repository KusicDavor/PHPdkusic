<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['title'];

    public function meals(){
        return $this->hasMany(Meal::class);
    }
}
