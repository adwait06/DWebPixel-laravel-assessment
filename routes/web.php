<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use Inertia\Inertia;
use App\Http\Controllers\JobController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('skills', SkillController::class);
Route::resource('jobs', JobController::class);
// Route::get('skills', [SkillController::class, 'index']);
// Route::post('skills', [SkillController::class, 'store']);
// Route::put('skills/{id}', [SkillController::class, 'update']);
// Route::delete('skills/{id}', [SkillController::class, 'destroy']);
require __DIR__.'/auth.php';
