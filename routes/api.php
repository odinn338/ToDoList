<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\BoardShareController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('boards', BoardController::class);

    Route::get('/boards/{board}/tasks', [TaskController::class, 'index']);
    Route::post('/boards/{board}/tasks', [TaskController::class, 'store']);


    Route::apiResource('tasks', TaskController::class)
        ->only(['update', 'destroy']);

    Route::post(
        '/boards/{board}/share',
        [BoardShareController::class, 'store']
    );
});
