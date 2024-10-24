<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::prefix('client', function () {
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/show/{client}', [ClientController::class, 'show'])->name('client.show');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/client/{id}/attendance', [AttendanceController::class, 'index']);

    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::delete('/{attendance}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/show/{attendance}', [AttendanceController::class, 'show'])->name('attendance.show');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::get('/edit/{attendance}', [AttendanceController::class, 'edit'])->name('attendance.edit');
    // });

    Route::prefix('attendance', function () {
        Route::post('/', [AttendanceController::class, 'store'])->name('attendance.store');
        Route::put('/', [AttendanceController::class, 'update'])->name('attendance.update');
        Route::delete('/', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

        Route::get('/', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/', [AttendanceController::class, 'show'])->name('attendance.show');
        Route::get('/', [AttendanceController::class, 'create'])->name('attendance.create');
        Route::get('/', [AttendanceController::class, 'edit'])->name('attendance.edit');
    });

    Route::prefix('comment', function () {
        Route::post('/', [CommentController::class, 'store'])->name('comment.store');
        Route::put('/', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/', [CommentController::class, 'destroy'])->name('comment.destroy');

        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
        Route::get('/', [CommentController::class, 'show'])->name('comment.show');
        Route::get('/', [CommentController::class, 'create'])->name('comment.create');
        Route::get('/', [CommentController::class, 'edit'])->name('comment.edit');
    });
});

require __DIR__ . '/auth.php';

