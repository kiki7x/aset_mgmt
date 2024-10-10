<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsetTikController;
use App\Http\Controllers\FrontController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index']);

Route::get('admin', [AdminController::class, 'index']);

Route::get('admin/asettik', [AsetTikController::class, 'index']);