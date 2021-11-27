<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-new-post', [PostController::class, 'addNewPost'])->name('addNewPost');
Route::get('/post/edit/{id}', [PostController::class, 'editPostValue'])->name('editPost');
Route::post('/edited-post', [PostController::class, 'newPostValue'])->name('newEditValue');
// Route::post('/confirm-delete-post', [PostController::class, 'confirmDeletePost'])->name('confirmDeletePost');
Route::post('/posts/delete-post', [PostController::class, 'deletePost'])->name('deletePost');
