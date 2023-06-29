<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\ComicController;

Route::get('/', [PageController::class, 'home'])->name('home');


route::resource('comics', ComicController::class);
