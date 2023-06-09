<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

// Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified', 'role.recruiter'])->group(function () {
    // Jobs
    Route::get('/dashboard', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

    // Show Job Applicants
    Route::get('/applicants/{job}', [ApplicantController::class, 'index'])->name('applicants.index');

    // Notifications
    Route::get('/notifications', NotificationController::class)->name('notifications.index');
    Route::get('/notifications/old', [NotificationController::class, 'old'])->name('notifications.old');
});

Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');


require __DIR__ . '/auth.php';
