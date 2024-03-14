<?php

use App\Controller\AuthController;
use App\Http\Controllers\MealsController;
use Illuminate\Support\Facades\Route;


Route::get('/meals', [AuthController::class, 'index']);
//prikaži meal za traženi id
Route::get('/meals/{id}', [MealsController::class, 'show']);