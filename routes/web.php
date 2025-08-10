<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SqlinjectionController;
use App\Http\Controllers\XssController;
use App\Http\Controllers\CommandInjectionController;
use App\Http\Controllers\CsrfController;
use App\Http\Controllers\LfiController;
use App\Http\Controllers\NoSqlInjectionController;
use App\Http\Controllers\RfiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard.show');

Route::get('/xss', [XssController::class, 'show'])->name('xss');
Route::get('/xss/{type}/{level}', [XssController::class, 'handleXssController'])->name('xss_details');
Route::get('/xss/reflected/1/sent/', [XssController::class, 'xssReflectedLevelOne'])->name('xss_reflected_level_one');
Route::get('/xss/reflected/2/sent/', [XssController::class, 'xssReflectedLevelTwo'])->name('xss_reflected_level_two');

Route::get('/sql-injection', [SqlinjectionController::class, 'show'])->name('sql_injection');
Route::get('/sql-injection/{type}/{level}', [SqlinjectionController::class, 'handleSqlInjectionController'])->name('sql_injection_details');
Route::get('/sql-injection/error_based/1/', [SqlinjectionController::class, 'sqlInjectionErrorBasedLevelOne'])->name('sql_injection_level_one');

Route::get('/command-injection', [CommandInjectionController::class, 'show'])->name('command_injection');
Route::get('/command-injection/{type}/{level}', [CommandInjectionController::class, 'handleCommandInjectionController'])->name('command_injection_details');
Route::post('/command-injection/normal/1', [CommandInjectionController::class, 'commandInjectionErrorBasedLevelOne'])->name('command_injection_level_one');
Route::post('/command-injection/normal/2', [CommandInjectionController::class, 'commandInjectionErrorBasedLevelTwo'])->name('command_injection_level_two');

Route::get('/csrf', [CsrfController::class, 'show'])->name('csrf');
Route::match(['get', 'post'],'/csrf/change/password', [CsrfController::class, 'update'])
                ->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])->name('csrf_level_one');

Route::get('/lfi', [LfiController::class, 'show'])->name('lfi');
Route::get('/lfi/{type}/{level}', [LfiController::class, 'handleLfiController'])->name('lfi_details');
Route::get('/lfi/normal/1/', [LfiController::class, 'lfiLevelOne'])->name('lfi_level_one');

Route::get('/rfi', [RfiController::class, 'show'])->name('rfi');
Route::get('/rfi/{type}/{level}', [RfiController::class, 'handleRfiController'])->name('rfi_details');
Route::get('/rfi/normal/1/', [RfiController::class, 'lfiLevelOne'])->name('rfi_level_one');

Route::get('/no-sql-injection', [NoSqlInjectionController::class, 'show'])->name('no_sql_injection');
Route::get('/no-sql-injection/{type}/{level}', [NoSqlInjectionController::class, 'handleNoSqlInjectionController'])->name('no_sql_injection_details');
Route::match(['post', 'get'], '/no-sql-injection/normal/1', [NoSqlInjectionController::class, 'noSqlInjectionNormalLevelOne'])->name('no_sql_injection_level_one');
