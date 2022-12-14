<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('completing-data', [App\Http\Controllers\HomeController::class, 'completing'])->name('completing');
    Route::post('completing-data', [App\Http\Controllers\HomeController::class, 'updateData'])->name('completing-data');
    
    Route::middleware(['completed'])->group(function () {
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('home-data', [App\Http\Controllers\HomeController::class, 'adminDashboardData'])->name('home-data');
        Route::post('home-data', [App\Http\Controllers\HomeController::class, 'adminDashboardUpdate'])->name('home-data-update');
        Route::get('info', [App\Http\Controllers\HomeController::class, 'info'])->name('info');
        Route::get('syarat-perlombaan', [App\Http\Controllers\HomeController::class, 'syarat'])->name('syarat');

        Route::get('upload-karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya');
        Route::post('upload-karya', [App\Http\Controllers\KaryaController::class, 'save'])->name('karya-create');
    });

    Route::middleware(['isadmin'])->group(function () {
        Route::get('peserta-baru', [App\Http\Controllers\AdminController::class, 'pesertaBaru'])->name('peserta-baru');
        
        Route::post('karya-update', [App\Http\Controllers\AdminController::class, 'reviewUpdate'])->name('need-review-update');

        Route::get('need-review', [App\Http\Controllers\AdminController::class, 'needReview'])->name('need-review');
        Route::get('need-review-detail/{user}', [App\Http\Controllers\AdminController::class, 'needReviewDetail'])->name('need-review-detail');
        
        Route::get('on-review', [App\Http\Controllers\AdminController::class, 'onReview'])->name('on-review');
        Route::get('on-review-detail/{user}', [App\Http\Controllers\AdminController::class, 'onReviewDetail'])->name('on-review-detail');
        
        Route::get('assesment', [App\Http\Controllers\AdminController::class, 'assesment'])->name('assesment');
        Route::get('assesment-detail/{user}', [App\Http\Controllers\AdminController::class, 'assesmentDetail'])->name('assesment-detail');
        
        Route::get('un-passed', [App\Http\Controllers\AdminController::class, 'unPassed'])->name('un-passed');
        Route::get('un-passed-detail/{user}', [App\Http\Controllers\AdminController::class, 'unPassedDetail'])->name('un-passed-detail');
        
        Route::get('passed', [App\Http\Controllers\AdminController::class, 'passed'])->name('passed');
    });
});
