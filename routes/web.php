<?php

use App\Http\Controllers\EpiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('checkAdministrador')->group( function()
{
    Route::prefix('administrador/epi')->group( function()
    {
        Route::get('/create', [EpiController::class, 'create'])->name('epi.create');
        Route::get('/edit', [EpiController::class, 'edit'])->name('epi.edit');
        Route::get('/delete', [EpiController::class, 'delete'])->name('epi.delete');
    });
});
