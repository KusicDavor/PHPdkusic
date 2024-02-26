<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meals_ingredients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')
            ->references('id')
            ->on('meals')->onDelete('cascade');

            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
              ->references('id')
              ->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals_ingredients');
    }
};
