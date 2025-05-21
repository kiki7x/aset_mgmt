<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;


// Auth Controller
Route::get('login', [App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');
Route::post('post-login', [App\Http\Controllers\Auth\AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register');
Route::post('post-register', [App\Http\Controllers\Auth\AuthController::class, 'postRegister'])->name('register.post');
Route::get('dashboard', [App\Http\Controllers\Auth\AuthController::class, 'dashboard']);
Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

// FrontSite landing page
Route::get('testing', [App\Http\Controllers\FrontController::class, 'testing'])->name('testing');
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('/');
Route::get('/lacak', [App\Http\Controllers\FrontController::class, 'lacak'])->name('lacak');
Route::get('/lacak/show/{id}', [App\Http\Controllers\FrontController::class, 'lacak_show'])->name('lacak.show');

//Admin Area
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    // halaman list Aset TIK
    Route::middleware(['role:super_admin|admin_tik|staf_tik'])->group(function() {
        Route::get('/asettik', App\Livewire\Assets\IndexAsetTik::class)->name('admin.asettik');
        Route::get('/asettik/show/{id}/{section?}', App\Livewire\Assets\ShowAsetTik::class)->name('admin.asettik.show');
        // Route::get('/asettik/create', App\Livewire\Modal\CreateAsetTik::class)->name('admin.asettik.create');
    });

    Route::get('/setting_attr', [App\Http\Controllers\SetatributController::class, 'index'])->name('admin.setting_attr');

    // halaman list Aset RT
    Route::middleware(['role:super_admin|admin_rt|staf_driver|staf_engineering'])->group(function() {
        Route::get('/asetrt', App\Livewire\Assets\IndexAsetRt::class)->name('admin.asetrt');
        Route::get('/asetrt/show/{id}/{section?}', App\Livewire\Assets\ShowAsetRt::class)->name('admin.asetrt.show');
        // Route::get('/asetrt/create', App\Livewire\Modal\CreateAsetRt::class)->name('admin.asetrt.create');
    });

    // halaman list Issues
    Route::middleware(['role:super_admin|admin_tik|admin_rt|staf_tik|staf_driver|staf_engineering'])->group(function() {
        Route::get('/issues', App\Livewire\Issues\IndexIssues::class)->name('admin.issues');
        // Route::get('/issues', App\Livewire\Issues\CreateIssues::class)->name('admin.issues');
    });

    // Route Setting Klasifikasi
    Route::get('/setting_attr/klasifikasi', App\Livewire\Assets\IndexAsetKlasifikasi::class)->name('admin.setting_attr.klasifikasi');
    Route::get('/setting_attr/klasifikasi/show/{id}/{section?}', App\Livewire\Assets\ShowKlasifikasi::class)->name('admin.setting_attr.klasifikasi.show');
    Route::get('/setting_attr/klasifikasi/edit/{id}/{section?}', App\Livewire\Assets\EditKlasifikasi::class)->name('admin.setting_attr.klasifikasi.edit');

    // Route Setting Kategori
    Route::get('/setting_attr/kategori', App\Livewire\Assets\IndexAsetKategori::class)->name('admin.setting_attr.kategori');
    Route::get('/setting_attr/kategori/show/{id}/{section?}', App\Livewire\Assets\ShowKategori::class)->name('admin.setting_attr.kategori.show');
    Route::get('/setting_attr/kategori/edit/{id}/{section?}', App\Livewire\Assets\EditKategori::class)->name('admin.setting_attr.kategori.edit');

    // Route Setting Merk
    Route::get('/setting_attr/merk', App\Livewire\Assets\IndexAsetMerk::class)->name('admin.setting_attr.merk');
    Route::get('/setting_attr/merk/show/{id}/{section?}', App\Livewire\Assets\ShowMerk::class)->name('admin.setting_attr.merk.show');
    Route::get('/setting_attr/merk/edit/{id}/{section?}', App\Livewire\Assets\EditMerk::class)->name('admin.setting_attr.merk.edit');

    // Route Setting Model
    Route::get('/setting_attr/model', App\Livewire\Assets\IndexAsetModel::class)->name('admin.setting_attr.model');
    Route::get('/setting_attr/model/show/{id}/{section?}', App\Livewire\Assets\ShowModel::class)->name('admin.setting_attr.model.show');
    Route::get('/setting_attr/model/edit/{id}/{section?}', App\Livewire\Assets\EditModel::class)->name('admin.setting_attr.model.edit');

    // Route Setting Supplier
    Route::get('/setting_attr/supplier', App\Livewire\Assets\IndexAsetSupplier::class)->name('admin.setting_attr.supplier');
    Route::get('/setting_attr/supplier/show/{id}/{section?}', App\Livewire\Assets\ShowSupplier::class)->name('admin.setting_attr.supplier.show');
    Route::get('/setting_attr/supplier/edit/{id}/{section?}', App\Livewire\Assets\EditSupplier::class)->name('admin.setting_attr.supplier.edit');

    // Route Setting Label
    Route::get('/setting_attr/label', App\Livewire\Assets\IndexAsetLabel::class)->name('admin.setting_attr.label');
    Route::get('/setting_attr/label/show/{id}/{section?}', App\Livewire\Assets\ShowLabel::class)->name('admin.setting_attr.label.show');
    Route::get('/setting_attr/label/edit/{id}/{section?}', App\Livewire\Assets\EditLabel::class)->name('admin.setting_attr.label.edit');

    // Route Setting Lokasi
    Route::get('/setting_attr/lokasi', App\Livewire\Assets\IndexAsetLokasi::class)->name('admin.setting_attr.lokasi');
    Route::get('/setting_attr/lokasi/show/{id}/{section?}', App\Livewire\Assets\ShowLokasi::class)->name('admin.setting_attr.lokasi.show');
    Route::get('/setting_attr/lokasi/edit/{id}/{section?}', App\Livewire\Assets\EditLokasi::class)->name('admin.setting_attr.lokasi.edit');


});
