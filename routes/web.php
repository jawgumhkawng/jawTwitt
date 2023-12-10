<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::post('/post', [PostController::class, 'store'])->name('post.create');

Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/{post}/update', [PostController::class, 'update'])->name('post.update');

Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('post.store.comment');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('/terms');
});
