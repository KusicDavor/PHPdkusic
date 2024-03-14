<?php

namespace Database\Factories;

use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tags>
 */
class TagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Tags::class;

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
        $fakerSlug = Faker::create();
        return [
                'slug' => $fakerSlug->word,
                'en' => [
                    'title' => $fakerEN->word,
                ],
                'fr' => [
                    'title' => $fakerFR->word,
                ],
                'hr' => [
                    'title' => $fakerHR->word,
                ],
        ];
    }
}
