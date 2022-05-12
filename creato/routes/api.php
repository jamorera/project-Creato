<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Insumo\InsumoController;
use App\Http\Controllers\Api\Cliente\ClienteController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login',[AuthController::class,'login']);   

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Rutas auth
    Route::post('register',[AuthController::class,'register']);
    Route::get('user_profile',[AuthController::class,'userProfile']);
    Route::get('logout',[AuthController::class,'logout']);

    // Rutas para solicitud

    //Clientes
    Route::group(['prefix' => 'cliente'], function () {
        Route::get('/',[ClienteController::class,'index'])->name('cliente.home');
        Route::post('/create',[ClienteController::class,'create'])->name('cliente.create');
        Route::put('/update/{id}',[ClienteController::class,'update'])->name('cliente.update');
        Route::delete('/delete/{id}',[ClienteController::class,'destroy'])->name('cliente.destroy');    
        Route::get('/show/{id}',[ClienteController::class,'show'])->name('cliente.show');
    });
    //Insumos
    Route::group(['prefix' => 'insumo'], function () {
        Route::get('/',[InsumoController::class,'index'])->name('insumo.home');
        Route::post('/create',[InsumoController::class,'create'])->name('insumo.create');
        Route::put('/update/{id}',[InsumoController::class,'update'])->name('insumo.update');
        Route::delete('/delete/{id}',[InsumoController::class,'destroy'])->name('insumo.destroy');    
        Route::get('/show/{id}',[InsumoController::class,'show'])->name('insumo.show');
    });

    
    
    
    
});