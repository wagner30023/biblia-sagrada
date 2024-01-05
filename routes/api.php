<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use App\Models\Livro;
use App\Models\Versiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class,
    ]);

    Route::post('/logout',[AuthController::class,'logout']);
});

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

// Route::prefix('testamento')->group(function(){
//     Route::get('/',[TestamentoController::class,'index']);
//     Route::get('/{testamento}',[TestamentoController::class,'show']);
//     Route::put('/{testamento}',[TestamentoController::class,'update']);
//     Route::delete('/{testamento}',[TestamentoController::class,'destroy']);
//     Route::post('/',[TestamentoController::class,'store']);
// });

// Route::prefix('livro')->group(function(){
//     Route::get('/',[LivroController::class,'index']);
//     Route::get('/{livro}',[LivroController::class,'show']);
//     Route::put('/{livro}',[LivroController::class,'update']);
//     Route::delete('/{livro}',[LivroController::class,'destroy']);
//     Route::post('/',[LivroController::class,'store']);
// });

// Route::prefix('versiculo')->group(function(){
//     Route::get('/',[VersiculoController::class,'index']);
//     Route::get('/{versiculo}',[VersiculoController::class,'show']);
//     Route::put('/{versiculo}',[VersiculoController::class,'update']);
//     Route::delete('/{versiculo}',[VersiculoController::class,'destroy']);
//     Route::post('/',[VersiculoController::class,'store']);
// });


