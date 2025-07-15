<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Content\CreateIntoStyleController;
use App\Http\Controllers\Content\UpdateContentController;
use App\Http\Controllers\Content\SaveSectionStyleController;
use App\Http\Controllers\Content\SaveSubSectionStyleController;
use App\Http\Controllers\Content\UpdateThemeStyleController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

// Import & Export Route
Route::get('/export', [ExportController::class, 'exportDefaultExcel'])->name('export.export-default-file')->middleware('auth');
Route::controller(ImportController::class)->group(function(){
    Route::get('/import', 'index')->name('import.import-content');
    Route::post('/import', 'import')->name('import.store-content');
})->middleware('auth');
//
Route::post('/create-intro-style', [CreateIntoStyleController::class, 'createThemeIntroStyle'])->name('create-intro-style');

// Style content Route
Route::prefix('/update')->group(function(){
    Route::prefix('/style-content')->group(function(){
        Route::get('/{id}', [UpdateContentController::class, 'update'])->name('update-content.index');
        Route::put('theme-style', [UpdateThemeStyleController::class, 'updateThemeStyle'])->name('update-content.update-theme-style');
        Route::post('section-style', [SaveSectionStyleController::class, 'saveSectionStyle'])->name('save-content.update-section-style');
        Route::post('sub-section-style', [SaveSubSectionStyleController::class, 'saveSubSectionStyle'])->name('save-content.update-sub-section-style');
    });
})->middleware('auth');

// Dashbord
Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::delete('/delete-theme/{id}', 'delete')->name('dashboard.delete-theme');
    Route::put('/active-theme/{theme}', 'activeTheme')->name('dashboard.active-theme');
})->middleware(['auth', 'verified']);

//Admin Route
Route::prefix('/admin')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::delete('/{user}', 'delete')->name('admin.delete-user');
        Route::get('/create-account', 'account')->name('admin.account');
        Route::post('/create-account', "addAccount")->name("admin.create-account");
    });
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
