<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('index', function () {
        $users = User::all();
        return view('admin',compact('users'));
    })->middleware(a)->name('admin');

    Route::get('/profile/{user}', [AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile/{user}', [AdminController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile/{user}', [AdminController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
