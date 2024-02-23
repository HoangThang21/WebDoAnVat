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
<<<<<<< HEAD


Route::get('/cart', function () {
    return view('Client.cart');
});
=======
Route::get('/contact', function () {
    return view('Client.contact');
});
>>>>>>> c8caa75eb12661bc0ee47d0d2d3c1ebada1f42b8
