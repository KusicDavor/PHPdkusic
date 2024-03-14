<?php

use App\Http\Controllers\MealsController;
use Illuminate\Support\Facades\Route;


Route::get('/meals', [MealsController::class, 'index']);
//prikaži meal za traženi id
Route::get('/meals/{id}', [MealsController::class, 'show']);