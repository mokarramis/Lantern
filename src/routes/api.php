<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function (){
    Route::post('sign-up', [AuthController::class, 'signUp']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

Route::group(['prefix' => 'assets', 'middleware' => 'auth:api'], function (){
    Route::group(['prefix' => 'other', 'middleware' => 'auth:api'], function (){
        Route::post('store', [AssetController::class, 'store']);
        Route::put('update/{asset}', [AssetController::class, 'update']);
        Route::delete('destroy/{asset}', [AssetController::class, 'delete']);
    });

    Route::group(['prefix' => 'gold', 'middleware' => 'auth:api'], function (){
        Route::post('store', [GoldController::class, 'store']);
        Route::put('update/{gold}', [GoldController::class, 'update']);
        Route::delete('destroy/{gold}', [GoldController::class, 'delete']);
    });
});
