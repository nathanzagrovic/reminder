<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\DashboardController;
use App\Models\Reminder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/toggle-complete/{reminder}', function (Reminder $reminder) {
        $reminder->completed_at = $reminder->completed_at ? null : now();
        $reminder->save();
        return redirect()->back();
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('reminders', ReminderController::class);
    Route::post('/reminders/{reminder}/add-to-group', [ReminderController::class, 'addToGroup'])
        ->name('reminders.add-to-group');
    
    Route::resource('boards', BoardController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
