<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([ 'status' => 'OK', 'timestamp' => Carbon::now()]);
});

Route::controller(NewsController::class)->group(function () {
    Route::get('news', 'index');
    Route::get('news/{id}', 'show');
    Route::get('news/user/{id}', 'showByUser');
    Route::get('news/category/{id}', 'showByCategory');
    Route::post('news', 'store');
    Route::put('news/{id}', 'update');
    Route::delete('news/{id}', 'destroy');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('categories', 'index');
    Route::get('categories/{id}', 'show');
    Route::post('categories', 'store');
    Route::put('categories/{id}', 'update');
    Route::delete('categories/{id}', 'destroy');
});
