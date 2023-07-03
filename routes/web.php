<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\ComicController;

Route::get('/', [PageController::class, 'home'])->name('home');

route::get('/comics/trashed', [ComicController::class, 'trashed'])->name('comics.trashed');
route::resource('comics', ComicController::class);
route::delete('/comics/{comic}/hardDelete', [ComicController::class, 'hardDelete'])->name('comics.hardDelete');
route::post('/comics/{comic}/restore', [ComicController::class, 'restore'])->name('comics.restore');
