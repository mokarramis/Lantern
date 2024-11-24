<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\StockController;
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
        Route::delete('destroy/{gold}', [GoldController::class, 'destroy']);
    });

    Route::group(['prefix' => 'cash', 'middleware' => 'auth:api'], function (){
        Route::post('store', [CashController::class, 'store']);
        Route::put('update/{cash}', [CashController::class, 'update']);
        Route::delete('destroy/{cash}', [CashController::class, 'destroy']);
    });

    Route::group(['prefix' => 'account', 'middleware' => 'auth:api'], function (){
        Route::post('store', [AccountController::class, 'store']);
        Route::put('update/{account}', [AccountController::class, 'update']);
        Route::delete('destroy/{account}', [AccountController::class, 'destroy']);
    });

    Route::group(['prefix' => 'coin', 'middleware' => 'auth:api'], function (){
        Route::post('store', [CoinController::class, 'store']);
        Route::put('update/{coin}', [CoinController::class, 'update']);
        Route::delete('destroy/{coin}', [CoinController::class, 'destroy']);
    });

    Route::group(['prefix' => 'stock', 'middleware' => 'auth:api'], function (){
        Route::post('store', [StockController::class, 'store']);
        Route::put('update/{stock}', [StockController::class, 'update']);
        Route::delete('destroy/{stock}', [StockController::class, 'destroy']);
    });
});
