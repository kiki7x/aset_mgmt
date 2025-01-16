<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
// livewire
// use App\Livewire\ModalFormAset;
use App\Livewire\IndexAsetTik;
use App\Livewire\CreateAsetTik;


// Front end landing page
Route::get('/', [FrontController::class, 'index']);

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    // halaman list aset tik
    // Route::get('/asettik', [AdminController::class, 'asettik'])->name('admin.asettik');
    Route::get('/asettik', IndexAsetTik::class)->name('admin.asettik');
    Route::get('/asettik/create', CreateAsetTik::class)->name('admin.asettik.create');
    Route::get('/asettik_setting_attr', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik');
    // halaman list aset rt
    Route::get('/asetrt', [AdminController::class, 'asetrt'])->name('admin.asetrt');
    Route::get('/asetrt_setting_attr', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt');
});

//route component livewire
    // Route::get('modalformaset', ModalFormAset::class);
    // Route::livewire('/asettable', IndexAsetTik::class);