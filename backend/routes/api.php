<?php

use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DescriptionItemController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/descriptions', [DescriptionItemController::class, 'index']);
Route::post('/descriptions', [DescriptionItemController::class, 'store']);
