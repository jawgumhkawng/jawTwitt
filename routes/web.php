<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikeController;

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

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('user/{user}/follow', [FollowerController::class, 'follow'])->name('user.follow')->middleware('auth');

Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');


Route::post('posts/{post}/like', [LikeController::class, 'like'])->name('posts.like')->middleware('auth');

Route::post('posts/{post}/unlike', [LikeController::class, 'unlike'])->name('posts.unlike')->middleware('auth');

Route::get('feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('/terms');
})->name('terms');
