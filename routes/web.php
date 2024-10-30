<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetTikController;
use App\Http\Controllers\FrontController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index']);

//admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/asettik', [AdminController::class, 'asettik'])->name('admin.asettik');
    Route::get('/asetrt', [AdminController::class, 'asetrt'])->name('admin.asetrt');
    Route::get('/setting_attr_asettik', [AdminController::class, 'setting_attr_asettik'])->name('admin.setting_attr_asettik');
    Route::get('/setting_attr_asetrt', [AdminController::class, 'setting_attr_asetrt'])->name('admin.setting_attr_asetrt');
});