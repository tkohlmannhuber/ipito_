<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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





//POST ROUTES //
Route::post('posts/store', [PostController::class, 'store']);
Route::get('posts/index', [PostController::class, 'index']);
Route::get('posts/show/{id}', [PostController::class, 'show']);
///////


// USER POST ROUTES //
Route::get('userposts/index', '\App\Http\Controllers\UserPostController@allPosts');
Route::middleware('auth:sanctum')->get('/userposts/index', '\App\Http\Controllers\UserPostController@allPosts');

////////


// USER ROUTES ///
Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->get('/user/me', '\App\Http\Controllers\AuthController@me');
Route::middleware('auth:sanctum')->put('/user/', '\App\Http\Controllers\UserController@update');
Route::middleware('auth:sanctum')->get('/user/index', '\App\Http\Controllers\UserController@index');
///////


// COUNTRY ROUTES //
Route::resources([
    'countries' => \App\Http\Controllers\CountryController::class,
]);
///////
