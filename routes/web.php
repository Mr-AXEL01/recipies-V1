<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[RecipeController::class,'index']);
Route::get('/create',[RecipeController::class,'create']);
Route::post('/create    ',[RecipeController::class,'store']);
Route::get('/search', [RecipeController::class, 'search'])->name('search');

Route::delete('/delete/{recipe:title}', [RecipeController::class, 'destroy']);
Route::post('/edit/{recipe:title}', [RecipeController::class, 'edit']);
Route::put('/update/{recipe}', [RecipeController::class, 'update'])->name("recipes.update");
