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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Auth::routes(); */

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Route::get('assets', [App\Http\Controllers\AssetsController::class, 'index']);
    Route::get('assets/{article}', [App\Http\Controllers\AssetsController::class, 'show']);
    Route::post('assets/create', [App\Http\Controllers\AssetsController::class, 'store']);
    Route::put('assets/update', [App\Http\Controllers\AssetsController::class, 'update']);
    Route::delete('assets/{article}', [App\Http\Controllers\AssetsController::class, 'delete']);
});
