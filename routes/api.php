<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Models\User;
// use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
    
// });
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout');

//untuk middleware nya di rubah dulu menjadi auth:api sesuai dengan config guards
Route::middleware('auth:api')->group(function () {
    Route::apiResource('user', UserController::class);
    Route::apiResource('posts/content', PostsController::class);
    Route::apiResource('comments', CommentsController::class);
    
});

