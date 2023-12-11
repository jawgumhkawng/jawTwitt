<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::post('/posts', [PostController::class, 'store'])->name('posts.create');

// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');

// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');

Route::resource('posts', PostController::class)->middleware('auth');

Route::resource('posts', PostController::class)->only('show');

Route::resource('posts.comments', CommentController::class)->only('store');

Route::resource('user', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('/terms', function () {
    return view('/terms');
});
