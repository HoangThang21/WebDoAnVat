<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//php artisan serve

Route::get('/', function () {
    return view('Client.index');
});


Route::get('/cart', function () {
    return view('Client.cart');
});
Route::get('/contact', function () {
    return view('Client.contact');
});

Route::get('/shop', function () {
    return view('Client.shop');
});
Route::get('/shop-detail', function () {
    return view('Client.shopdetail');
});
