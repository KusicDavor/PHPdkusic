<?php

use App\Http\Controllers\MealsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//glavna ruta
Route::get('/meals', [MealsController::class, 'index']);
//prikaži meal za traženi id
Route::get('/meals/{id}', [MealsController::class, 'show']);
//obriši meal po id-u (za soft delete)
Route::get('/meals/delete/{id}', [MealsController::class, 'delete']);
//ažuriraj tag od meala po id-u (za soft delete)
Route::get('/meals/update/{id}', [MealsController::class, 'update']);
//vrati soft deleteani model
Route::get('/meals/restore/{id}', [MealsController::class, 'restore']);