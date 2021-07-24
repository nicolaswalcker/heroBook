<?php

use App\Http\Controllers\HeroController;
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

Route::group(['prefix' => 'heroes', 'as' => 'heroes.'], function () {
    Route::any('/search', [HeroController::class, 'search'])->name('search');
    Route::get('', [HeroController::class, 'index'])->name('index');
    Route::get('/create', [HeroController::class, 'create'])->name('create');
    Route::get('/{id}', [HeroController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('edit');
    Route::post('', [HeroController::class, 'store'])->name('store');
    Route::delete('/{id}', [HeroController::class, 'destroy'])->name('destroy');
    Route::put('/{id}', [HeroController::class, 'update'])->name('update');

});

Route::get('/', function () {
    return view('heroes.index');
});
