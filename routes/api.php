<?php

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
Route::get('/currency/{date}', [\App\Http\Controllers\CurrencyController::class, 'daily']);
Route::get('/currencies', [\App\Http\Controllers\CurrencyController::class, 'all']);

Route::post('/profile', [\App\Http\Controllers\CurrencyController::class, 'daily']);
Route::group(['middleware' => 'auth.basic'], function () {
    Route::post('/posts', [\App\Http\Controllers\PostsController::class, 'index']);
    Route::get('/notifications', [\App\Http\Controllers\NotificationsController::class, 'index']);
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });
    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'avatarUpdate']);
});

