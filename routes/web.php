<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function() {
    return 'Laravel is working!';
});

Route::get('/', [LandingController::class, 'index'])->name('home')->withoutMiddleware(['web']);
Route::post('/contato', [LandingController::class, 'store'])->name('contato.store');
