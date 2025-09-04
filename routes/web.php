<?php

use App\Http\Controllers\AffiliatesController;
use Illuminate\Support\Facades\Route;


Route::controller(AffiliatesController::class)->group( function () {
    Route::get('/', 'index')->name('index');
    Route::post('/results', 'process')->name('results');
});
