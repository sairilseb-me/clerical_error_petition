<?php

use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DescriptionItemController;
use App\Http\Controllers\DocumentSubmittedController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/descriptions', [DescriptionItemController::class, 'index']);
Route::post('/descriptions', [DescriptionItemController::class, 'store']);
Route::get('/documents', [DocumentSubmittedController::class, 'index']);
Route::post('/documents', [DocumentSubmittedController::class, 'store']);