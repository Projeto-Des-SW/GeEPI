<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EpiController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FiscalController;
use App\Http\Controllers\MovimentoEpiController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

        Route::get('/search', [EpiController::class, 'search'])->name('epi.search');

        Route::get('/create', [EpiController::class, 'create'])->name('epi.create');
        Route::post('/store', [EpiController::class, 'store'])->name('epi.store');

        Route::get('/edit/{epi_id}', [EpiController::class, 'edit'])->name('epi.edit');
        Route::post('/update', [EpiController::class, 'update'])->name('epi.update');

        Route::get('/delete/{epi_id}', [EpiController::class, 'delete'])->name('epi.delete');
    });

    Route::prefix('administrador/estoque')->group( function()
    {
        Route::get('/index', [EstoqueController::class, 'index'])->name('estoque.index');

        Route::get('/entrada', [MovimentoEpiController::class, 'create_entrada'])->name('movimento.entrada');
        Route::get('/saida', [MovimentoEpiController::class, 'create_saida'])->name('movimento.saida');
        Route::post('/store', [MovimentoEpiController::class, 'store'])->name('movimento.store');
    });

    Route::prefix('administrador/fiscal')->group( function()
    {
        Route::get('/index', [FiscalController::class, 'index'])->name('fiscal.index');

        Route::get('/create', [FiscalController::class, 'create'])->name('fiscal.create');
        Route::post('/store', [FiscalController::class, 'store'])->name('fiscal.store');

        Route::get('/fiscal/{fiscal_id}', [FiscalController::class, 'edit'])->name('fiscal.edit');
        Route::post('/update', [FiscalController::class, 'update'])->name('fiscal.update');

        Route::get('/delete/{fiscal_id}', [FiscalController::class, 'delete'])->name('fiscal.delete');

        Route::get('/search', [FiscalController::class, 'search'])->name('fiscal.search');


    });


    Route::prefix('administrador/setor')->group( function()
    {
        Route::get('/index', [SetorController::class, 'index'])->name('setor.index');

        Route::get('/create', [SetorController::class, 'create'])->name('setor.create');
        Route::post('/store', [SetorController::class, 'store'])->name('setor.store');

        Route::get('/setor/{setor_id}', [SetorController::class, 'edit'])->name('setor.edit');
        Route::post('/update', [SetorController::class, 'update'])->name('setor.update');

        Route::get('/delete/{setor_id}', [SetorController::class, 'delete'])->name('setor.delete');

    });



});

Route::middleware('checkAdministradorFiscal')->group( function(){
    Route::prefix('colaborador')->group( function()
    {
        Route::get('/index', [ColaboradorController::class, 'index'])->name('colaborador.index');

        Route::get('/search', [ColaboradorController::class, 'search'])->name('colaborador.search');

        Route::get('/create', [ColaboradorController::class, 'create'])->name('colaborador.create');
        Route::post('/store', [ColaboradorController::class, 'store'])->name('colaborador.store');

        Route::get('/colaborador/{colaborador_id}', [ColaboradorController::class, 'edit'])->name('colaborador.edit');
        Route::post('/update', [ColaboradorController::class, 'update'])->name('colaborador.update');

        Route::get('/delete/{colaborador_id}', [ColaboradorController::class, 'delete'])->name('colaborador.delete');
    });

    Route::get('/usuario/edit', [UserController::class, 'edit'])->name('usuario.editar_perfil');
    Route::post('/usuario/update', [UserController::class, 'update'])->name('usuario.update');
});

