<?php

use App\Http\Controllers\AuthController;
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

Route::resources([
    'posts' => \App\Http\Controllers\PostController::class,
]);

Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user/me', '\App\Http\Controllers\AuthController@me');

Route::middleware('auth:sanctum')->get('/supersecret', '\App\Http\Controllers\SecretController@secretRoute');

Route::resources([
    'countries' => \App\Http\Controllers\CountryController::class,
]);
