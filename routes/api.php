<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//asettiks
Route::apiResource('/asettiks', App\Http\Controllers\Api\AsettiksController::class);
// Route::apiResource('/assetclassifications', App\Http\Controllers\Api\AssetclassificationsController::class);
Route::apiResource('/assetcategories', App\Http\Controllers\Api\AssetcategoriesController::class);