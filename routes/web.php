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
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
    // halaman list Aset TIK
    Route::get('/asettik', App\Livewire\Assets\IndexAsetTik::class)->name('admin.asettik')->middleware('auth');
    Route::get('/asettik/show/{id}/{section?}', App\Livewire\Assets\ShowAsetTik::class)->name('admin.asettik.show')->middleware('auth');
    // Route::get('/asettik/create', App\Livewire\Modal\CreateAsetTik::class)->name('admin.asettik.create')->middleware('auth');
    Route::get('/setting_attr', [App\Http\Controllers\SetatributController::class, 'index'])->name('admin.setting_attr')->middleware('auth');

    // halaman list Aset RT
    Route::get('/asetrt', App\Livewire\Assets\IndexAsetRt::class)->name('admin.asetrt')->middleware('auth');
    Route::get('/asetrt/show/{id}/{section?}', App\Livewire\Assets\ShowAsetRt::class)->name('admin.asetrt.show')->middleware('auth');
    // Route::get('/asetrt/create', App\Livewire\Modal\CreateAsetRt::class)->name('admin.asetrt.create')->middleware('auth');

    // halaman list Issues
    Route::get('/issues', App\Livewire\Issues\IndexIssues::class)->name('admin.issues')->middleware('auth');
    // Route::get('/issues', App\Livewire\Issues\CreateIssues::class)->name('admin.issues')->middleware('auth');

    // Route Setting Klasifikasi
    Route::get('/setting_attr/klasifikasi', App\Livewire\Assets\IndexAsetKlasifikasi::class)->name('admin.setting_attr.klasifikasi')->middleware('auth');
    Route::get('/setting_attr/klasifikasi/show/{id}/{section?}', App\Livewire\Assets\ShowKlasifikasi::class)->name('admin.setting_attr.klasifikasi.show')->middleware('auth');
    Route::get('/setting_attr/klasifikasi/edit/{id}/{section?}', App\Livewire\Assets\EditKlasifikasi::class)->name('admin.setting_attr.klasifikasi.edit')->middleware('auth');

    // Route Setting Kategori
    Route::get('/setting_attr/kategori', App\Livewire\Assets\IndexAsetKategori::class)->name('admin.setting_attr.kategori')->middleware('auth');
    Route::get('/setting_attr/kategori/show/{id}/{section?}', App\Livewire\Assets\ShowKategori::class)->name('admin.setting_attr.kategori.show')->middleware('auth');
    Route::get('/setting_attr/kategori/edit/{id}/{section?}', App\Livewire\Assets\EditKategori::class)->name('admin.setting_attr.kategori.edit')->middleware('auth');

    // Route Setting Merk
    Route::get('/setting_attr/merk', App\Livewire\Assets\IndexAsetMerk::class)->name('admin.setting_attr.merk')->middleware('auth');
    Route::get('/setting_attr/merk/show/{id}/{section?}', App\Livewire\Assets\ShowMerk::class)->name('admin.setting_attr.merk.show')->middleware('auth');
    Route::get('/setting_attr/merk/edit/{id}/{section?}', App\Livewire\Assets\EditMerk::class)->name('admin.setting_attr.merk.edit')->middleware('auth');

    // Route Setting Model
    Route::get('/setting_attr/model', App\Livewire\Assets\IndexAsetModel::class)->name('admin.setting_attr.model')->middleware('auth');
    Route::get('/setting_attr/model/show/{id}/{section?}', App\Livewire\Assets\ShowModel::class)->name('admin.setting_attr.model.show')->middleware('auth');
    Route::get('/setting_attr/model/edit/{id}/{section?}', App\Livewire\Assets\EditModel::class)->name('admin.setting_attr.model.edit')->middleware('auth');

    // Route Setting Supplier
    Route::get('/setting_attr/supplier', App\Livewire\Assets\IndexAsetSupplier::class)->name('admin.setting_attr.supplier')->middleware('auth');
    Route::get('/setting_attr/supplier/show/{id}/{section?}', App\Livewire\Assets\ShowSupplier::class)->name('admin.setting_attr.supplier.show')->middleware('auth');
    Route::get('/setting_attr/supplier/edit/{id}/{section?}', App\Livewire\Assets\EditSupplier::class)->name('admin.setting_attr.supplier.edit')->middleware('auth');

    // Route Setting Label
    Route::get('/setting_attr/label', App\Livewire\Assets\IndexAsetLabel::class)->name('admin.setting_attr.label')->middleware('auth');
    Route::get('/setting_attr/label/show/{id}/{section?}', App\Livewire\Assets\ShowLabel::class)->name('admin.setting_attr.label.show')->middleware('auth');
    Route::get('/setting_attr/label/edit/{id}/{section?}', App\Livewire\Assets\EditLabel::class)->name('admin.setting_attr.label.edit')->middleware('auth');

    // Route Setting Lokasi
    Route::get('/setting_attr/lokasi', App\Livewire\Assets\IndexAsetLokasi::class)->name('admin.setting_attr.lokasi')->middleware('auth');
    Route::get('/setting_attr/lokasi/show/{id}/{section?}', App\Livewire\Assets\ShowLokasi::class)->name('admin.setting_attr.lokasi.show')->middleware('auth');
    Route::get('/setting_attr/lokasi/edit/{id}/{section?}', App\Livewire\Assets\EditLokasi::class)->name('admin.setting_attr.lokasi.edit')->middleware('auth');


});
