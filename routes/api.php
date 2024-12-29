<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Inertia\Inertia;

Route::get('/skills', [SkillController::class, 'index']);
Route::post('/skills', [SkillController::class, 'store']);


Route::get('/api/jobs', [JobController::class, 'search']);

require __DIR__.'/auth.php';
