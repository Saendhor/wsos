<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

//CRUD Projects
Route::resource('/projects', ProjectController::class);

//CRUD Tasks
Route::resource('/tasks', TaskController::class);
