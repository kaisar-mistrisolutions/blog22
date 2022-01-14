<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\BlogController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Dashboard Route 
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Blog Route 
Route::resource('/blogs', BlogController::class);