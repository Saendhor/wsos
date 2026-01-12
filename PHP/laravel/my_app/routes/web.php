<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/about',[PageController::class, 'about']);

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact',function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});*/