<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = auth()->user();
    return view('welcome',compact('user'));
});

Route::get('/dashboard', function () {
    /** @var User $user */
    $user = auth()->user();
    $posts = $user->posts;
    return view('dashboard',compact('user', 'posts'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('index', function () {
        $users = User::all();
        $user = auth()->user();
        return view('admin',compact('users', 'user'));
    })->middleware(\App\Http\Middleware\Admin::class)->name('admin');

    Route::get('/profile/{user}', [AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile/{user}', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile/{user}', [AdminController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('post')->middleware('auth')->group(function () {
    Route::get('index', function () {
        $posts = Post::all();
        return view('post.index',compact('posts'));
    })->middleware(\App\Http\Middleware\Admin::class)->name('admin');
    Route::get('/{post}', [postController::class, 'show'])->name('post.show');
    Route::get('/{post}/edit', [postController::class, 'edit'])->name('post.edit');
    Route::patch('/{post}', [postController::class, 'update'])->name('post.update');
    Route::delete('/{post}', [postController::class, 'destroy'])->name('post.destroy');
});

require __DIR__.'/auth.php';
