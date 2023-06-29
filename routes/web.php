<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
