<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FamilyController;
use Illuminate\Support\Facades\Route;
use Tests\Fixtures\Controllers\ProductController;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('/families', FamilyController::class);
Route::resource('/categories', CategoryController::class);
