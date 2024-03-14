<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerEN = Faker::create('en_US');
        $fakerFR = Faker::create('fr_FR');
        $fakerHR = Faker::create('hr_HR');

        $category_id = null;
        if (mt_rand(1, 5) !== 5) {
            $category_id = Category::all()->random();
        }

        return [
            'en' => [
                'title' => $fakerEN->word,
                'description' => $fakerEN->sentence,
            ],
            'fr' => [
                'title' => $fakerFR->word,
                'description' => $fakerFR->sentence,
            ],
            'hr' => [
                'title' => $fakerHR->word,
                'description' => $fakerHR->sentence,
            ],
            'category_id' => $category_id
        ];
    }
}
