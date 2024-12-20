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

// User pages (admin only now)
require __DIR__.'/auth.php';

Route::name('user.')->middleware(['auth', 'verified'])->group(function() {
    Route::resource('user/works', App\Http\Controllers\User\WorkController::class);

    Route::resource('user/educations', App\Http\Controllers\User\EducationController::class);

    Route::get('user/educations/{education_id}/theses/create', [App\Http\Controllers\User\ThesisController::class, 'create'])->name('theses.create');
    Route::post('user/theses', [App\Http\Controllers\User\ThesisController::class, 'store'])->name('theses.store');
    Route::get('user/theses/{thesis}/edit', [App\Http\Controllers\User\ThesisController::class, 'edit'])->name('theses.edit');
    Route::put('user/theses/{thesis}', [App\Http\Controllers\User\ThesisController::class, 'update'])->name('theses.update');
    Route::delete('user/theses/{thesis}', [App\Http\Controllers\User\ThesisController::class, 'destroy'])->name('theses.destroy');

    Route::get('user/works/{work_id}/workprojects/create', [App\Http\Controllers\User\WorkProjectController::class, 'create'])->name('workprojects.create');
    Route::post('user/workprojects', [App\Http\Controllers\User\WorkProjectController::class, 'store'])->name('workprojects.store');
    Route::get('user/workprojects/{workproject_id}/edit', [App\Http\Controllers\User\WorkProjectController::class, 'edit'])->name('workprojects.edit');
    Route::put('user/workprojects/{workproject_id}', [App\Http\Controllers\User\WorkProjectController::class, 'update'])->name('workprojects.update');
    Route::delete('user/workprojects/{workproject_id}', [App\Http\Controllers\User\WorkProjectController::class, 'destroy'])->name('workprojects.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
