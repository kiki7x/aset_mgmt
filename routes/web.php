<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
// livewire
use App\Livewire\Assets\IndexAsetTik;
use App\Livewire\Assets\ShowAsetTik;
use App\Livewire\Assets\EditAsetTik;
use App\Livewire\Assets\IndexAsetRt;
use App\Livewire\Assets\ShowAsetRt;
use App\Livewire\Assets\EditAsetRt;
use App\Livewire\Modal\CreateAsetTik;
use App\Livewire\Modal\CreateAsetRt;
use App\Livewire\Issues\IndexIssues;


// Front end landing page
Route::get('/', [FrontController::class, 'index']);

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
    // halaman list Aset TIK
    Route::get('/asettik', IndexAsetTik::class)->name('admin.asettik')->middleware('auth');
    Route::get('/asettik/show/{id}/{section?}', ShowAsetTik::class)->name('admin.asettik.show')->middleware('auth');
    Route::get('/asettik/create', CreateAsetTik::class)->name('admin.asettik.create')->middleware('auth');
    Route::get('/asettik_setting_attr', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik')->middleware('auth');
    // halaman list Aset RT
    Route::get('/asetrt', IndexAsetRt::class)->name('admin.asetrt')->middleware('auth');
    Route::get('/asetrt/show/{id}/{section?}', ShowAsetRt::class)->name('admin.asetrt.show')->middleware('auth');
    Route::get('/asetrt/create', CreateAsetRt::class)->name('admin.asetrt.create')->middleware('auth');
    Route::get('/asetrt_setting_attr', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt')->middleware('auth');
    // halaman list Issues
    Route::get('/issues', IndexIssues::class)->name('admin.issues')->middleware('auth');
});