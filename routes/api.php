<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\Document\DocumentController;

Route::post('/csv-store', [DocumentController::class, 'store'])->name('csv.store');
Route::get('/csv-data', [DocumentController::class, 'index'])->name('csv.index');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
