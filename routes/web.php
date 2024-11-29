<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
 
Route::controller(StaticPagesController::class)->group(function () {
    Route::get('/static_pages/home', 'home');
    Route::get('/static_pages/help', 'help');
    Route::get('/static_pages/about', 'about');
});
