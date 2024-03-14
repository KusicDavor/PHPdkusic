<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()
        ->count(3)
        ->state(new Sequence(
            ['lang' => 'en'],
            ['lang' => 'fr'],
            ['lang' => 'hr'],
        ))
        ->create();
    }
}
