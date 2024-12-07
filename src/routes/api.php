<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function (){
    Route::post('sign-up', [AuthController::class, 'signUp']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');
});

Route::group(['prefix' => 'assets', 'middleware' => 'auth:api'], function (){
    Route::group(['prefix' => 'other'], function (){
        Route::post('store', [AssetController::class, 'store']);
        Route::get('index', [AssetController::class, 'index']);
        Route::put('update/{asset}', [AssetController::class, 'update']);
        Route::delete('destroy/{asset}', [AssetController::class, 'delete']);
    });
    Route::apiResource('gold', GoldController::class);
    Route::apiResource('cash', CashController::class);
    Route::apiResource('account', AccountController::class);
    Route::apiResource('coin', CoinController::class);
    Route::apiResource('stock', StockController::class);
});


Route::apiResource('/transaction', TransactionController::class)->middleware('auth:api');
