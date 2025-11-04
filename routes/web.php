<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::controller(UserController::class)->group(function () {
    Route::get('/profile/{user:userName}', 'show')->name('user_profile');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/posts/{post:slug}/like', LikeController::class)->name('like_post');
    Route::post('/{user}/follow', [FollowController::class, 'follow'])->name('follow_user');
    Route::post('/{user}/unfollow', [FollowController::class, 'unfollow'])->name('unfollow_user');
    Route::controller(PostController::class)->group(function () {
        Route::get('posts/create', 'create')->name('create_post');
        Route::get('posts/{post:slug}/edit', 'edit')->name('edit_post');
        Route::post('posts/create', 'store')->name('store_post');
        Route::get('posts/{post:slug}', 'show')->name('show_post');
        Route::put('posts/{post:slug}', 'update')->name('update_post');
        Route::delete('posts/{post}', 'destroy')->name('delete_post');
        Route::get('/', 'index')->name('home_page');
        Route::get('/explore', 'explore')->name('explore_page');
    });
    Route::controller((CommentController::class))->group(function () {
        Route::post('posts/{post:slug}/comments/create', 'store')->name('store_comment');
    });
});

require __DIR__.'/auth.php';
