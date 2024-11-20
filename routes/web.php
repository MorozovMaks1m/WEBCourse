<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// welcome
Route::get('/', \App\Http\Controllers\WelcomeController::class);

// work
Route::get('works', [\App\Http\Controllers\WorkController::class, 'index']);
Route::get('works/{id}',[\App\Http\Controllers\WorkController::class, 'show']);

// education
Route::get('educations', [\App\Http\Controllers\EducationController::class, 'index']);
Route::get('educations/{id}',[\App\Http\Controllers\EducationController::class, 'show']);

Route::name('user.')->group(function() {
    Route::resource('user/works', App\Http\Controllers\User\WorkController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
