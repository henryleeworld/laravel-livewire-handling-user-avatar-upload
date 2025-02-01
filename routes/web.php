<?php

use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::post('upload', [UploadController::class, 'store']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('avatar/{userId}', [UserController::class, 'getAvatar'])->name('avatar');
});

require __DIR__.'/auth.php';
