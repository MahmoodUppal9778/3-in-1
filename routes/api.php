<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;

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
Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function(){

	Route::get('posts', [PostController::class, 'index']);

	Route::post('post/add', [PostController::class, 'store']);

	Route::get('post/{id}/show', [PostController::class, 'show']);

	Route::put('post/{id}/update', [PostController::class, 'update']);

	Route::delete('post/{id}/delete', [PostController::class, 'destroy']);


	Route::post('logout', [AuthController::class, 'logout']);

});
/*
Route::post('/post/add', [PostController::class, 'store']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/*
Route::group(['middleware' => ['auth:sanctum'] ], function({
}));
*/
