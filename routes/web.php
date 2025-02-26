<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ChatController;
use App\Livewire\Inbox;
use App\Livewire\Profile;
use App\Livewire\Settings;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create'])->name('create.user');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile/{user}', Profile::class)->name('profile.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/services', [DashboardController::class, 'commissionServices'])->name('services.index');
    Route::get('/services/create', [DashboardController::class, 'createService'])->name('services.create');
    Route::post('/services', [DashboardController::class, 'storeService'])->name('services.store');
    Route::get('/services/{service}/edit', [DashboardController::class, 'editService'])->name('services.edit');
    Route::put('/services/{service}', [DashboardController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [DashboardController::class, 'destroyService'])->name('services.destroy');

    Route::get('/board', [BoardController::class, 'index'])->name('boards.index');
    Route::put('/board/{commission}', [BoardController::class, 'update'])->name('boards.update');
    Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');
    Route::get('/commissions/create/{service}', [CommissionController::class, 'create'])->name('commissions.create');
    Route::post('/commissions/{service}', [CommissionController::class, 'store'])->name('commissions.store');
    Route::get('/commissions/{commission}', [CommissionController::class, 'show'])->name('commissions.show');
    Route::get('/commissions/{commission}/data', [CommissionController::class, 'showData'])->name('commissions.show-data');
    Route::put('/commissions/{commission}', [CommissionController::class, 'update'])->name('commissions.update');
    Route::put('/commissions/{commission}/from-modal', [CommissionController::class, 'updateFromModal'])->name('commissions.update-from-modal');
    Route::patch('/commissions/{commission}/status', [CommissionController::class, 'updateStatus'])->name('commissions.update-status');
    Route::post('/commissions/{commission}/progress', [CommissionController::class, 'addProgressUpdate'])->name('commissions.add-progress');
    Route::get('/inbox', Inbox::class)->name('inbox.index');
});
