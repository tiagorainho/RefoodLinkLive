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

Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['is_owner'])->group(function () {
        Route::get('/dashboard', Dashboard::class);
        Route::get('/estabelecimentos', Establishments::class);
    });
    
    Route::get('/', Search::class);
    Route::get('/perfil', Profile::class);
    Route::get('/procurar', Search::class)->name('search');
    Route::get('/estabelecimento/{id}', Establishment::class);
});

Route::get('/entrar', Login::class)->name('login');
Route::get('/registar', Register::class);