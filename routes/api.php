<?php

use App\Http\Controllers\ArenaController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AccessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/erro', [AccessController::class, 'erroPage']);
Route::post('/token', [AccessController::class, 'requestToken']);

Route::middleware('ptoken')->group(function(){

    // Rotas dos jogos
    Route::post('/jogos', [JogoController::class, 'jogos']); 
    Route::post('/jogos/todos', [JogoController::class, 'todosJogos']);
    Route::post('/jogos/criar', [JogoController:: class, 'criarJogo']);
    Route::post('/jogos/remover', [JogoController::class, 'removerJogo']);
    Route::post('/jogos/atualizar', [JogoController::class, 'atualizarJogo']);

    // Rotas das arenas
    Route::post('/arenas', [ArenaController::class, 'arenas']);
    Route::post('/arenas/criar', [ArenaController::class, 'criarArena']);
    Route::post('/arenas/remover', [ArenaController::class, 'removerArena']);
    Route::post('/arenas/atualizar', [ArenaController::class, 'atualizarArena']);


    // Rotas de usuarios
    Route::post('/usuarios',[UsuarioController::class, 'usuarios']);
    Route::post('/usuarios/criar', [UsuarioController::class, 'criarUsuario']);
    Route::post('/usuarios/remover', [UsuarioController::class, 'removerUsuario']);
    Route::post('/usuarios/atualizar', [UsuarioController::class, 'atualizarUsuario']);

});

