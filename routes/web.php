<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\DepartmentController;

Route::get('/', [FrontPageController::class, 'index'])->name('welcome');
Route::get('/{slug}/detail', [FrontPageController::class, 'detail'])->name('job.detail');
Route::post('/apply-job', [FrontPageController::class, 'jobStore'])->name('job.store');

Route::prefix('manage')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('departments', DepartmentController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('applicants', ApplicantController::class);

    Route::get('/candidates', [ApplicantController::class, 'candidate'])->name('candidates.index');
    Route::get('/interviews', [ApplicantController::class, 'interview'])->name('interviews.index');
    Route::get('/trainings', [ApplicantController::class, 'training'])->name('trainings.index');
    Route::get('/probations', [ApplicantController::class, 'probation'])->name('probations.index');
    Route::get('/employees', [ApplicantController::class, 'employee'])->name('employees.index');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
