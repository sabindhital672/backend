<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('author')->name('author.')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});

// Admin Routes (Protected by AdminMiddleware)
Route::group(['prefix' => 'admin', 'middleware' => [AdminMiddleware::class]], function() {
    Route::resource('users', AdminUserController::class)->names('admin.users');
    Route::resource('posts', AdminPostController::class)->names('admin.posts');
});

// Authentication routes
Auth::routes();
