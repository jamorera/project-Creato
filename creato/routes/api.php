<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Rol\RolController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Insumo\InsumoController;
use App\Http\Controllers\Api\Cliente\ClienteController;
use App\Http\Controllers\Api\Solicitud\IndexController;
use App\Http\Controllers\Api\Madera_lamina\Madera_laminaController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login',[AuthController::class,'login']);   
Route::post('register',[AuthController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Rutas auth
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
    Route::group(['prefix' => 'madera_lamina'], function () {
        Route::get('/',[Madera_laminaController::class,'index'])->name('madera_insumo.home');
        Route::post('/create',[Madera_laminaController::class,'create'])->name('madera_insumo.create');
        Route::put('/update/{id}',[Madera_laminaController::class,'update'])->name('madera_insumo.update');
        Route::delete('/delete/{id}',[Madera_laminaController::class,'destroy'])->name('madera_insumo.destroy');    
        Route::get('/show/{id}',[Madera_laminaController::class,'show'])->name('madera_insumo.show');
    });
    Route::group(['prefix' => 'rol'], function () {
        Route::get('/',[RolController::class,'index'])->name('rol.home');
        Route::post('/create',[RolController::class,'create'])->name('rol.create');
        Route::put('/update/{id}',[RolController::class,'update'])->name('rol.update');
        Route::delete('/delete/{id}',[RolController::class,'destroy'])->name('rol.destroy');    
        Route::get('/show/{id}',[RolController::class,'show'])->name('rol.show');
    });
    
    Route::group(['prefix' => 'solicitud'], function () {
        Route::get('/',[App\Http\Controllers\Api\Solicitud\IndexController::class,'index'])->name('solicitud.home');
        Route::post('/create',[App\Http\Controllers\Api\Solicitud\CreateController::class,'create'])->name('solicitud.create');
        Route::put('/update/{id}',[App\Http\Controllers\Api\Solicitud\UpdateController::class,'update'])->name('solicitud.update');
        Route::delete('/delete/{id}',[App\Http\Controllers\Api\Solicitud\DestroyController::class,'destroy'])->name('solicitud.destroy');    
        Route::get('/show/{id}',[App\Http\Controllers\Api\Solicitud\ShowController::class,'show'])->name('solicitud.show');
    });
});

Route::group(['prefix' => 'ficha_tecnica'], function () {
    Route::get('/',[App\Http\Controllers\Api\Ficha_tecnica\IndexController::class,'index'])->name('ficha_tecnica.home');
    Route::post('/cubicar_huacal_madera',[App\Http\Controllers\Api\Ficha_tecnica\CubicarMaderaController::class,'huacal_madera'])->name('ficha_tecnica.huacal_madera');
    Route::post('/create',[App\Http\Controllers\Api\Ficha_tecnica\CreateController::class,'create'])->name('ficha_tecnica.create');
    Route::put('/update/{id}',[App\Http\Controllers\Api\Ficha_tecnica\UpdateController::class,'update'])->name('ficha_tecnica.update');
    Route::delete('/delete/{id}',[App\Http\Controllers\Api\Ficha_tecnica\DestroyController::class,'destroy'])->name('ficha_tecnica.destroy');    
    Route::get('/show/{id}',[App\Http\Controllers\Api\Ficha_tecnica\ShowController::class,'show'])->name('ficha_tecnica.show');
});