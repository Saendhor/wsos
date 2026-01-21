<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage']);

Route::resource('/albums', AlbumController::class);

Route::resource('/tracks', TrackController::class);