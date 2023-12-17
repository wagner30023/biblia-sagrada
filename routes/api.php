<?php

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use App\Models\Versiculo;
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


Route::prefix('testamento')->group(function(){
    Route::get('/',[TestamentoController::class,'index']);
    Route::get('/{testamento}',[TestamentoController::class,'show']);
    Route::put('/{testamento}',[TestamentoController::class,'update']);
    Route::delete('/{testamento}',[TestamentoController::class,'destroy']);
    Route::post('/',[TestamentoController::class,'store']);
});

Route::prefix('livro')->group(function(){
    Route::get('/',[LivroController::class,'index']);
    Route::get('/{livro}',[LivroController::class,'show']);
    Route::put('/{livro}',[LivroController::class,'update']);
    Route::delete('/{livro}',[LivroController::class,'destroy']);
    Route::post('/',[LivroController::class,'store']);
});

Route::prefix('versiculo')->group(function(){
    Route::get('/',[VersiculoController::class,'index']);
    Route::get('/{versiculo}',[VersiculoController::class,'show']);
    Route::put('/{versiculo}',[VersiculoController::class,'update']);
    Route::delete('/{versiculo}',[VersiculoController::class,'destroy']);
    Route::post('/',[VersiculoController::class,'store']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
