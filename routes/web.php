<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SqlinjectionController;
use App\Http\Controllers\XssController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard.show');

Route::get('/xss', [XssController::class, 'show'])->name('xss');
Route::get('/sql-injection', [SqlinjectionController::class, 'show'])->name('sql_injection');
