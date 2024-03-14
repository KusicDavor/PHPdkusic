<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredients;
use App\Models\Meal;
use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            Meal::factory()
            ->count(30)
            ->hasTags(2)
            ->hasIngredients(4)
            ->hasCategory()
            ->create();
        }
    }
}
