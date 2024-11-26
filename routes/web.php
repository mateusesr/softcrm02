<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TypeController;
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
    Route::delete('/profile', [ProfileController::class, 'desactivate'])->name('profile.desactivate');


    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/client', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/client/search', [ClientController::class, 'search'])->name('clients.search');

    Route::delete('/client/{id}', [ClientController::class, 'desactivate'])->name('client.desactivate');
    Route::post('/client/{id}/reactivate', [ClientController::class, 'reactivate'])->name('client.reactivate');


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
    Route::get('/attendance/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');



    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/show/{comment}', [CommentController::class, 'show'])->name('comment.show');
    Route::get('/comment/create/{attendance_id}', [CommentController::class, 'create'])->name('comment.create');
    Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/city/search', [CityController::class, 'search'])->name('city.search');
});

Route::resource('comment', CommentController::class);
Route::resource('clients', ClientController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('city', CityController::class);
Route::resource('type', TypeController::class);

require __DIR__ . '/auth.php';
