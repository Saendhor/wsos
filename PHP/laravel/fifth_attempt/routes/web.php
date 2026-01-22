<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//Landing page
Route::get("/", [PageController::class, 'index']);

//Full CRUD
Route::resource('/albums', AlbumController::class);
Route::resource('/tracks', TrackController::class);