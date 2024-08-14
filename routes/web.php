<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Document\DocumentController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::post('/csv-store', [DocumentController::class, 'store'])->name('csv.store');
Route::get('/csv-data', [DocumentController::class, 'index'])->name('csv.index');
Route::get('/csv-create', [DocumentController::class, 'create'])->name('csv.create');

