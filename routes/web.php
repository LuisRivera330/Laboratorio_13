<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function() {
    return redirect('/posts');
});
Route::get('/home', function (){
    return redirect('/posts');
});

Route::get('/posts', [PostController::class, 'index'])->name('allPosts');
Route::view('/posts/create', 'posts.create');
Route::post('/posts/create', [PostController::class, 'store']);
Route::get('/posts/myPosts', [PostController::class, 'userPosts']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('posts/myPosts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('user/{user}',[UserController::class, 'update'])->name('users.update');
Route::get('user/delete',[UserController::class, 'destroy'])->name('users.delete');
Auth::routes();
