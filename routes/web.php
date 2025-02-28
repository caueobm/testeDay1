<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\IsAdmin;

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

Route::prefix('filmes')->name("movie.")->middleware(EnsureTokenIsValid::class)->group(function () {

    Route::get('/',               [MovieController::class, 'index'])->name('index')->middleware(EnsureTokenIsValid::class);
    Route::get('/criar',          [MovieController::class, 'createOrEdit'])->name('create')->middleware(IsAdmin::class);;
    Route::get('/{id}/editar',    [MovieController::class, 'createOrEdit'])->name('edit')->middleware(IsAdmin::class);;

    Route::post('/salvar',        [MovieController::class, 'save'])->name('save')->middleware(IsAdmin::class);;
    Route::put('/salvar',         [MovieController::class, 'save'])->name('update')->middleware(IsAdmin::class);;
    Route::delete('/{id}/deletar',[MovieController::class, 'delete'])->name('delete')->middleware(IsAdmin::class);;
});
//->withoutMiddleware([EnsureTokenIsValid::class]);

Route::prefix('clientes')->name("customer.")->middleware(EnsureTokenIsValid::class)->group(function () {

    Route::get('/',                 [CustomerController::class, 'index'])->name('index')->middleware(IsAdmin::class);
    Route::get('/criar',            [CustomerController::class, 'createOrEdit'])->name('create')->middleware(IsAdmin::class);
    Route::get('/{id}/editar',      [CustomerController::class, 'createOrEdit'])->name('edit')->middleware(EnsureTokenIsValid::class);

    Route::post('/salvar',          [CustomerController::class, 'save'])->name('save');
    Route::put('/salvar',           [CustomerController::class, 'save'])->name('update');
    Route::delete('/{id}/delete',   [CustomerController::class, 'delete'])->name('delete');
});

Route::prefix('alugueis')->name("rent.")->middleware(EnsureTokenIsValid::class)->group(function () {

    Route::get('{id}/alugar',                           [RentController::class, 'create'])->name('create')->middleware(EnsureTokenIsValid::class);
    Route::get('/{id}',                                 [RentController::class, 'index'])->name('index')->middleware(EnsureTokenIsValid::class);

    Route::post('/salvar',                              [RentController::class, 'save'])->name('save')->middleware(EnsureTokenIsValid::class);

    Route::delete('/{movieId}/delete/{customerId}',     [RentController::class, 'delete'])->name('delete')->middleware(EnsureTokenIsValid::class);

});

Route::prefix('entrar')->name("login.")->group(function () {
    Route::get('/',                                  [LoginController::class, 'index'])->name('index');
    Route::get('/logar',                             [LoginController::class, 'login'])->name('login');
    Route::get('/cadastra-se',                       [LoginController::class, 'signupOrEdit'])->name('signup');
    Route::get('{id}/editar',                        [LoginController::class, 'signupOrEdit'])->name('edit');
    Route::post('/salvar',                           [LoginController::class, 'save'])->name('save');
    Route::put('/salvar',                            [LoginController::class, 'save'])->name('update');

    Route::get('logout',                             [LoginController::class, 'logout'])->name('logout');
    Route::get('/authenticate',                      [LoginController::class, 'authenticate'])->name('authenticate');
});
