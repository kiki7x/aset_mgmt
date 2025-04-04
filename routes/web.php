<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

// auth controller
use App\Http\Controllers\Auth\AuthController;

// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SetatributController;
use App\Http\Controllers\KlasifikasiController;

// livewire
use App\Livewire\Assets\IndexAsetTik;
use App\Livewire\Assets\ShowAsetTik;
use App\Livewire\Assets\EditAsetTik;

use App\Livewire\Assets\IndexAsetKlasifikasi;
use App\Livewire\Assets\ShowKlasifikasi;
use App\Livewire\Assets\EditKlasifikasi;

use App\Livewire\Assets\IndexAsetRt;
use App\Livewire\Assets\ShowAsetRt;
use App\Livewire\Assets\EditAsetRt;

use App\Livewire\Issues\IndexIssues;
use App\Livewire\Modal\CreateAsetTik;
use App\Livewire\Modal\CreateAsetRt;
use App\Livewire\Modal\CreateIssue;

// Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Front end landing page
Route::get('/', [FrontController::class, 'index']);

//route admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
    // halaman list Aset TIK
    Route::get('/asettik', IndexAsetTik::class)->name('admin.asettik')->middleware('auth');
    Route::get('/asettik/show/{id}/{section?}', ShowAsetTik::class)->name('admin.asettik.show')->middleware('auth');
    // Route::get('/asettik/create', CreateAsetTik::class)->name('admin.asettik.create')->middleware('auth');
    Route::get('/setting_attr', [SetatributController::class, 'index'])->name('admin.setting_attr')->middleware('auth');

    // Route Setting Klasifikasi
    Route::get('/setting_attr/klasifikasi', IndexAsetKlasifikasi::class)->name('admin.setting_attr.klasifikasi')->middleware('auth');
    Route::get('/setting_attr/klasifikasi/show/{id}/{section?}', ShowKlasifikasi::class)->name('admin.setting_attr.klasifikasi.show')->middleware('auth');
    Route::get('/setting_attr/klasifikasi/edit/{id}/{section?}', EditKlasifikasi::class)->name('admin.setting_attr.klasifikasi.edit')->middleware('auth');

    // Route Setting Kategori
    Route::get('/setting_attr/kategori', [SetatributController::class, 'kategori'])->name('admin.setting_attr.kategori')->middleware('auth');

    // Route Setting Merk
    Route::get('/setting_attr/merk', [SetatributController::class, 'merk'])->name('admin.setting_attr.merk')->middleware('auth');

    // Route Setting Model
    Route::get('/setting_attr/model', [SetatributController::class, 'model'])->name('admin.setting_attr.model')->middleware('auth');

    Route::get('/setting_attr/supplier', [SetatributController::class, 'supplier'])->name('admin.setting_attr.supplier')->middleware('auth');

    Route::get('/setting_attr/label', [SetatributController::class, 'label'])->name('admin.setting_attr.label')->middleware('auth');

    Route::get('/setting_attr/lokasi', [SetatributController::class, 'lokasi'])->name('admin.setting_attr.lokasi')->middleware('auth');
    // halaman list Aset RT
    Route::get('/asetrt', IndexAsetRt::class)->name('admin.asetrt')->middleware('auth');

    Route::get('/asetrt/show/{id}/{section?}', ShowAsetRt::class)->name('admin.asetrt.show')->middleware('auth');
    // Route::get('/asetrt/create', CreateAsetRt::class)->name('admin.asetrt.create')->middleware('auth');
    // halaman list Issues
    Route::get('/issues', IndexIssues::class)->name('admin.issues')->middleware('auth');


});
