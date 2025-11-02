<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebController;
use App\Http\Controllers\Api\RegisteredUserController;

// Route::post('/register', [RegisteredUserController::class, 'store']);
// use App\Http\Controllers\Api\AuthController;

Route::post('/userregister', [RegisteredUserController::class, 'userregister']);
Route::post('/userlogin', [RegisteredUserController::class, 'userlogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/userlogout', [RegisteredUserController::class, 'userlogout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


Route::get('/test', [WebController::class, 'test']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
