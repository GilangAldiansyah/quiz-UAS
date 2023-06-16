<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/product', ProductController::class);

Route::get('/habis', [ProductController::class, 'available'])->name('product.available');
Route::get('/masih', [ProductController::class, 'unavailable'])->name('product.unavailable');
