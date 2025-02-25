<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentController;

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

Route::prefix('filmes')->name("movie.")->group(function () {

    Route::get('/',               [MovieController::class, 'index'])->name('index');
    Route::get('/criar',          [MovieController::class, 'createOrEdit'])->name('create');
    Route::get('/{id}/editar',    [MovieController::class, 'createOrEdit'])->name('edit');

    Route::post('/salvar',        [MovieController::class, 'save'])->name('save');
    Route::put('/salvar',         [MovieController::class, 'save'])->name('update');
    Route::delete('/{id}/deletar',[MovieController::class, 'delete'])->name('delete');
});

Route::prefix('clientes')->name("customer.")->group(function () {

    Route::get('/',                 [CustomerController::class, 'index'])->name('index');
    Route::get('/criar',            [CustomerController::class, 'createOrEdit'])->name('create');
    Route::get('/{id}/editar',      [CustomerController::class, 'createOrEdit'])->name('edit');

    Route::post('/salvar',          [CustomerController::class, 'save'])->name('save');
    Route::put('/salvar',          [CustomerController::class, 'save'])->name('update');
    Route::delete('/{id}/delete',   [CustomerController::class, 'delete'])->name('delete');
});

Route::prefix('alugueis')->name("rent.")->group(function () {

    Route::get('/{id}',                     [RentController::class, 'index'])->name('index');
    Route::get('{id}/alugar',           [RentController::class, 'create'])->name('create');

    Route::post('/salvar',              [RentController::class, 'save'])->name('save');

    Route::delete('/{movieId}/delete/{customerId}',   [RentController::class, 'delete'])->name('delete');

});
