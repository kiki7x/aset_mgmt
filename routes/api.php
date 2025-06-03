<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//asettiks
Route::apiResource('/asset', App\Http\Controllers\Api\AssetController::class);
// Route::apiResource('/assetclassifications', App\Http\Controllers\Api\AssetclassificationsController::class);
Route::apiResource('/assetcategories', App\Http\Controllers\Api\AssetcategoriesController::class);

// Route::get('/users', [App\Http\Controllers\Api\UserController::class, 'fetchUsers'])->name('api.users.fetch');
Route::get('/users', [App\Http\Controllers\Api\UserController::class, 'fetchUsers'])->name('api.users.fetch');
Route::get('/user/{id}', [App\Http\Controllers\Api\UserController::class, 'fetchUser/{id}'])->name('api.user.{id}.fetch');