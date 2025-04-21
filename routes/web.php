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

// livewire AsetTik
use App\Livewire\Assets\IndexAsetTik;
use App\Livewire\Assets\ShowAsetTik;
use App\Livewire\Assets\EditAsetTik;

// livewire AsetKlasifikasi
use App\Livewire\Assets\IndexAsetKlasifikasi;
use App\Livewire\Assets\ShowKlasifikasi;
use App\Livewire\Assets\EditKlasifikasi;

// livewire AsetKategori
use App\Livewire\Assets\IndexAsetKategori;
use App\Livewire\Assets\ShowKategori;
use App\Livewire\Assets\EditKategori;

// livewire AsetMerk
use App\Livewire\Assets\IndexAsetMerk;
use App\Livewire\Assets\ShowMerk;
use App\Livewire\Assets\EditMerk;

// livewire AsetModel
use App\Livewire\Assets\IndexAsetModel;
use App\Livewire\Assets\ShowModel;
use App\Livewire\Assets\EditModel;

// livewire AsetSupplier
use App\Livewire\Assets\IndexAsetSupplier;
use App\Livewire\Assets\ShowSupplier;
use App\Livewire\Assets\EditSupplier;

// livewire AsetLabel
use App\Livewire\Assets\IndexAsetLabel;
use App\Livewire\Assets\ShowLabel;
use App\Livewire\Assets\EditLabel;

// livewire AsetLokasi
use App\Livewire\Assets\IndexAsetLokasi;
use App\Livewire\Assets\ShowLokasi;
use App\Livewire\Assets\EditLokasi;

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
Route::get('/lacak', [FrontController::class, 'lacak'])->name('lacak');

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
    Route::get('/setting_attr/kategori', IndexAsetKategori::class)->name('admin.setting_attr.kategori')->middleware('auth');
    Route::get('/setting_attr/kategori/show/{id}/{section?}', ShowKategori::class)->name('admin.setting_attr.kategori.show')->middleware('auth');
    Route::get('/setting_attr/kategori/edit/{id}/{section?}', EditKategori::class)->name('admin.setting_attr.kategori.edit')->middleware('auth');

    // Route Setting Merk
    Route::get('/setting_attr/merk', IndexAsetMerk::class)->name('admin.setting_attr.merk')->middleware('auth');
    Route::get('/setting_attr/merk/show/{id}/{section?}', ShowMerk::class)->name('admin.setting_attr.merk.show')->middleware('auth');
    Route::get('/setting_attr/merk/edit/{id}/{section?}', EditMerk::class)->name('admin.setting_attr.merk.edit')->middleware('auth');

    // Route Setting Model
    Route::get('/setting_attr/model', IndexAsetModel::class)->name('admin.setting_attr.model')->middleware('auth');
    Route::get('/setting_attr/model/show/{id}/{section?}', ShowModel::class)->name('admin.setting_attr.model.show')->middleware('auth');
    Route::get('/setting_attr/model/edit/{id}/{section?}', EditModel::class)->name('admin.setting_attr.model.edit')->middleware('auth');

    // Route Setting Supplier
    Route::get('/setting_attr/supplier', IndexAsetSupplier::class)->name('admin.setting_attr.supplier')->middleware('auth');
    Route::get('/setting_attr/supplier/show/{id}/{section?}', ShowSupplier::class)->name('admin.setting_attr.supplier.show')->middleware('auth');
    Route::get('/setting_attr/supplier/edit/{id}/{section?}', EditSupplier::class)->name('admin.setting_attr.supplier.edit')->middleware('auth');

    // Route Setting Label
    Route::get('/setting_attr/label', IndexAsetLabel::class)->name('admin.setting_attr.label')->middleware('auth');
    Route::get('/setting_attr/label/show/{id}/{section?}', ShowLabel::class)->name('admin.setting_attr.label.show')->middleware('auth');
    Route::get('/setting_attr/label/edit/{id}/{section?}', EditLabel::class)->name('admin.setting_attr.label.edit')->middleware('auth');

    // Route Setting Lokasi
    Route::get('/setting_attr/lokasi', IndexAsetLokasi::class)->name('admin.setting_attr.lokasi')->middleware('auth');
    Route::get('/setting_attr/lokasi/show/{id}/{section?}', ShowLokasi::class)->name('admin.setting_attr.lokasi.show')->middleware('auth');
    Route::get('/setting_attr/lokasi/edit/{id}/{section?}', EditLokasi::class)->name('admin.setting_attr.lokasi.edit')->middleware('auth');

    // halaman list Aset RT
    Route::get('/asetrt', IndexAsetRt::class)->name('admin.asetrt')->middleware('auth');

    Route::get('/asetrt/show/{id}/{section?}', ShowAsetRt::class)->name('admin.asetrt.show')->middleware('auth');
    // Route::get('/asetrt/create', CreateAsetRt::class)->name('admin.asetrt.create')->middleware('auth');
    
    // halaman list Issues
    Route::get('/issues', IndexIssues::class)->name('admin.issues')->middleware('auth');


});
