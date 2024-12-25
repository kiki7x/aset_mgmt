<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetTikController;
use App\Http\Controllers\FrontController;

// livewire
use App\Livewire\ModalFormAset;
use App\Livewire\AsetTikManager;



Route::get('/', [FrontController::class, 'index']);

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    // halaman list aset tik
    Route::get('/asettik', [AdminController::class, 'asettik'])->name('admin.asettik');
    // setting atribut aset tik
    Route::get('/setting_attr_asettik', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik');

    Route::get('/asetrt', [AdminController::class, 'asetrt'])->name('admin.asetrt');
    Route::get('/setting_attr_asetrt', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt');
});

//route livewire component
    Route::get('modalformaset', ModalFormAset::class);
    Route::get('asettikmanager', AsetTikManager::class);