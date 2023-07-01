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
        Route::get('/index', [EpiController::class, 'index'])->name('epi.index');

        Route::get('/create', [EpiController::class, 'create'])->name('epi.create');
        Route::post('/store', [EpiController::class, 'store'])->name('epi.store');

        Route::get('/edit/{epi_id}', [EpiController::class, 'edit'])->name('epi.edit');
        Route::post('/update', [EpiController::class, 'update'])->name('epi.update');

        Route::get('/delete/{epi_id}', [EpiController::class, 'delete'])->name('epi.delete');
    });
});
