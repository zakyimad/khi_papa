<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyactivityController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\LicensedappController;
use App\Http\Controllers\Exports_CKP;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\test;
use App\Http\Controllers\SuggestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ActivitiesController::class, 'index']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::get('act/filterMonthYear', [ActivitiesController::class, 'filterMonthYear'])->name('act.filterMonthYear');
Route::get('act/selftable', [ActivitiesController::class, 'selftable'])->name('act.selftable');
Route::get('act/monitoring', [ActivitiesController::class, 'monitoring'])->name('act.monitoring');
Route::get('act/filterMonthYear2', [ActivitiesController::class, 'filterMonthYear2'])->name('act.filterMonthYear2');

Route::resource('act', ActivitiesController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('generateDocx', [ActivitiesController::class, 'generateDocx'])->name('act.generateDocx');

Route::get('export-to-excel/{tahun}/{bulan}', [Exports_CKP::class, 'exportToExcel'])->name('export.activities');

// Route::get('test', [test::class,'index']);

Route::resource('licensedapp', LicensedappController::class);

//Suggestion
Route::get('/autocomplete/search', [SuggestController::class, 'search'])->name('autocomplete.search');
