<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('inicio');
})->middleware(['auth'])->name('/');


Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth'])->name('dashboard');

Route::get('/inicio', function () {
    return view('inicio');
})->middleware(['auth'])->name('inicio');

Route::get('/recipes', function () {
    return view('recipes');
})->middleware(['auth'])->name('recipes-index');

Route::get('/orders', function () {
    return view('orders');
})->middleware(['auth'])->name('orders-index');

Route::get('/ingredients', function () {
    return view('ingredients');
})->middleware(['auth'])->name('ingredients-index');

Route::get('/mercados', function () {
    return view('mercados');
})->middleware(['auth'])->name('mercados-index');

require __DIR__.'/auth.php';
