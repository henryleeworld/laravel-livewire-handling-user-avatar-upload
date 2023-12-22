<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
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
