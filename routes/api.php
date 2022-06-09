<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\IngredientOrderController;
use App\Http\Controllers\Api\RecipeOrderController;
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

Route::apiResource('recipes', RecipeController::class);
Route::apiResource('ingredients', IngredientController::class);
Route::apiResource('orders', RecipeOrderController::class);
Route::apiResource('mercados', IngredientOrderController::class);

Route::prefix('orders')->group(function () {
    Route::prefix('recipes')->group(function () {
        Route::post('create', [RecipeOrderController::class, 'create']);
    });
});
