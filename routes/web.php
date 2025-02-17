<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('filmes')->group(function () {

    Route::get('/',         [MovieController::class, 'index']);
    Route::get('/criar',    [MovieController::class, 'form'])->name('movie.create');
    Route::post('/salvar',  [MovieController::class, 'save'])->name('movie.save');


});

Route::prefix('clientes')->group(function () {

    Route::get('/',         [CustomerController::class, 'index']);
    Route::get('/criar',    [CustomerController::class, 'form'])->name('customer.create');
    Route::post('/salvar',  [CustomerController::class, 'save'])->name('customer.save');


});
