<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetTikController;
use App\Http\Controllers\FrontController;

use App\Livewire\ModalFormAset;
Route::get('modalformaset', modalformaset::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index']);

//admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    // list aset tik
    Route::get('/asettik', [AdminController::class, 'asettik'])->name('admin.asettik');
    // create aset tik
    Route::get('/asettik/create', [AdminController::class, 'asettik_create'])->name('admin.asettik.create');
    // show single aset tik
    Route::get('/asettik/{id}/show', [AdminController::class, 'asettik_show'])->name('admin.asettik.show');
    // edit single aset tik
    Route::get('/asettik/{id}/edit', [AdminController::class, 'asettik_edit'])->name('admin.asettik.edit');
    // setting atribut aset tik
    Route::get('/setting_attr_asettik', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik');


    Route::get('/asetrt', [AdminController::class, 'asetrt'])->name('admin.asetrt');
    Route::get('/setting_attr_asetrt', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt');
});