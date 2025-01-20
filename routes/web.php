<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
// livewire
// use App\Livewire\ModalFormAset;
use App\Livewire\IndexAsetTik;
use App\Livewire\CreateAsetTik;
use App\Livewire\ShowAsetTik;


// Front end landing page
Route::get('/', [FrontController::class, 'index']);

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
    // halaman list aset tik
    // Route::get('/asettik', [AdminController::class, 'asettik'])->name('admin.asettik');
    Route::get('/asettik', IndexAsetTik::class)->name('admin.asettik')->middleware('auth');
    Route::get('/asettik/create', CreateAsetTik::class)->name('admin.asettik.create')->middleware('auth');
    Route::get('/asettik/show', ShowAsetTik::class)->name('admin.asettik.show')->middleware('auth');
    Route::get('/asettik_setting_attr', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik')->middleware('auth');
    // halaman list aset rt
    Route::get('/asetrt', [AdminController::class, 'asetrt'])->name('admin.asetrt')->middleware('auth');
    Route::get('/asetrt_setting_attr', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt')->middleware('auth');
});

//route component livewire
    // Route::get('modalformaset', ModalFormAset::class);
    // Route::livewire('/asettable', IndexAsetTik::class);