<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserFiller;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::paginate(10);
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/export-excel',[UserController::class, 'exportExcel'])->name('export-excel')->middleware(['auth', 'verified']);
Route::get('/seed', [UserFiller::class, 'SeedUsers'])->name('seed')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
