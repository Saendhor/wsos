<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get("/",[PageController::class,"homepage"]);

Route::resource("projects", ProjectController::class);

Route::resource("tasks", TaskController::class);