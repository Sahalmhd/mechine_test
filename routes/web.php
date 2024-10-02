<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Faker\Guesser\Name;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('dologin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Define separate routes for admin and user home after logging in
Route::get('/home', [UserController::class, 'index'])->middleware('auth')->name('home');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');



Route::resource('posts', PostController::class)->middleware('auth');
