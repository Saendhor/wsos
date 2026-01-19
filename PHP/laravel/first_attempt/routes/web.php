<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//Homepage
Route::get('/', [PageController::class, 'homepage']);

//About us
Route::get('/about', [PageController::class, 'about']);

//CRUD on resource
Route::resource('projects',ProjectsController::class);
