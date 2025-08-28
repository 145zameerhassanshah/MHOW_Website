<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OldSystem\OldTourController;

Route::get('all-tours', [OldTourController::class, 'index'])->name('old.tours.index');
Route::post('/all-tours/search', [OldTourController::class, 'search'])->name('old.tours.search');