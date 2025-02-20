<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Models\Movie;

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

    Route::get('/',         [MovieController::class, 'index'])->name('movie.index');
    Route::get('/criar',    [MovieController::class, 'form'])->name('movie.create');
    Route::post('/salvar',  [MovieController::class, 'save'])->name('movie.save');
    Route::delete('/{id}/delete', [MovieController::class, 'delete'])->name('movie.delete');
});

Route::prefix('clientes')->group(function () {

    // ( / = route index)
    Route::get('/',         [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/criar',    [CustomerController::class, 'form'])->name('customer.create');
    Route::post('/salvar',  [CustomerController::class, 'save'])->name('customer.save');
    Route::delete('/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
});
