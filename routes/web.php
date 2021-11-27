<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PostController::class, 'showAllPost'])->name('posts');
Route::get('/home', [PostController::class, 'showAllPost'])->name('posts');
Route::get('/posts', [PostController::class, 'showAllPost'])->name('posts');
Route::get('/post/{id}', [PostController::class, 'showOnePost'])->name('post');
Route::get('/addPost', [PostController::class, 'addPostForm'])->name('addPost');
