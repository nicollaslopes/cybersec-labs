<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SqlinjectionController;
use App\Http\Controllers\XssController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard.show');

Route::get('/xss', [XssController::class, 'show'])->name('xss');

Route::get('/xss/{type}/{level}', [XssController::class, 'showVuln'])->name('xss_details');
Route::get('/xss/reflected/1/sent/', [XssController::class, 'xssReflectedLevelOne'])->name('xss_reflected_level_one');
Route::get('/xss/reflected/2/sent/', [XssController::class, 'xssReflectedLevelTwo'])->name('xss_reflected_level_two');

Route::get('/sql-injection', [SqlinjectionController::class, 'show'])->name('sql_injection');
Route::get('/sql-injection/{type}/{level}', [SqlinjectionController::class, 'handleSqlInjectionController'])->name('sql_injection_details');
Route::get('/sql-injection/error-based/1/', [SqlinjectionController::class, 'sqlInjectionErrorBasedLevelOne'])->name('sql_injection_level_one');
