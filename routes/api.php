<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/receitas', [RecipeController::class, 'list'])->name('recipe.list');
Route::post('/receitas', [RecipeController::class, 'create'])->name('recipe.create');
Route::get('/receitas/{id}', [RecipeController::class, 'detail'])->name('recipe.detail');
Route::put('/receitas/{id}', [RecipeController::class, 'update'])->name('recipe.update');
Route::delete('/receitas/{id}', [RecipeController::class, 'delete'])->name('recipe.delete');




