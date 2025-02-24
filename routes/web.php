<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistDashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [ArtistDashboardController::class, 'index'])->name('dashboard');
Route::get('/settings', [ArtistDashboardController::class, 'settings'])->name('settings');
Route::get('/commission-services', [ArtistDashboardController::class, 'commissionServices'])->name('commission-services');
