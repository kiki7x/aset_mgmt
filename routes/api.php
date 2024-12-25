<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//asettiks
Route::apiResource('/asettik', App\Http\Controllers\Api\AsettikController::class);
Route::apiResource('/categories', App\Http\Controllers\Api\AssetcategoriesController::class);