<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
Route::prefix('admin')->group(function(){
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});