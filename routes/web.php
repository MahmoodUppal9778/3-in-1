<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\FetchDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/posts', PostController::class);

/*
Route::controller(PostController::class)->group(function(){


   Route::get('/all/post', 'index')->name('post.index');

   Route::get('/particularmodel/post/{id}', 'getParticularModel')->name('post.getParticularModel');
   Route::get('/post/pdf', 'createPDF')->name('post.create.pdf');

   Route::post('/post/store', 'store')->name('post.store');
   Route::post('/post/update', 'update')->name('post.update');

   Route::get('/delete/post/{id}', 'destroy')->name('post.delete');

});
*/
Route::get("email", [PHPMailerController::class, "email"])->name("email");

Route::get("email/settings", [PHPMailerController::class, "emailSetting"])->name("settings");

Route::post("email/smtp", [PHPMailerController::class, "SMTPSetting"])->name("smtp");



Route::post("send-email", [PHPMailerController::class, "composeEmail"])->name("send-email");

Route::POST("email/test", [PHPMailerController::class, "EmailTest"])->name("test");

Route::get("jsonplaceholderdata", [FetchDataController::class, "fetchTodos"])->name("json.index");

Route::get("todos", [FetchDataController::class, "index"])->name("json.index");

Route::get("todos/fetch", [FetchDataController::class, "fetchTodos"])->name("json.fetch");
