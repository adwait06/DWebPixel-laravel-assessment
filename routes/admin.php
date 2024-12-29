<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Jobs\{Index,Create};
use App\Livewire\Pages\Skills\{Index as SkillsIndex};
use App\Livewire\Pages\Skills\{Store as SkillsStore};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Inertia\Inertia;

Route::redirect('/', '/admin/dashboard');

// Dashboard
Route::get('/dashboard', Dashboard::class)->name('dashboard');

// Skills
Route::get('/skills', SkillsIndex::class)->name('skills.index');
//Route::post('/skills', SkillsStore::class,'addSkill')->name('skills.addSkill');
// routes/web.php
//Route::post('/skills', [SkillController::class,'store'])->name('skills.store');
//Route::resource('skills', SkillController::class);


// Jobs
Route::get('/jobs', Index::class)->name('jobs.index');
Route::get('/jobs/create', Create::class)->name('jobs.create');

