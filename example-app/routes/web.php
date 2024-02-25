<?php

use App\Http\Controllers\AdminController;
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
Route::get('/testimonial', function () {
    return view('Client.testimonial');
});
Route::get('/checkout', function () {
    return view('Client.checkout');
});

//----------------------------------------------------------------------
//ADMIN
Route::get('/{name}', [
    AdminController::class, 'index'
]);
Route::get('/Administrator/login', [
    AdminController::class, 'login'
]);
Route::post('/Administrator', [
    AdminController::class, 'loginuser'
]);
Route::post('/Administrator/themnd', [
    AdminController::class, 'themnd'
]);
Route::get('/Administrator/themnguoidung', [
    AdminController::class, 'themnguoidung'
]);
Route::get('/Administrator/logoutadmin', [
    AdminController::class, 'logoutadmin'
]);
Route::get('/Administrator/doimatkhau', [
    AdminController::class, 'doimatkhau'
]);
Route::get('/Administrator/hoso', [
    AdminController::class, 'hoso'
]);
Route::post('/Administrator/doimatkhau', [
    AdminController::class, 'doimk'
]);

Route::get('/Administrator/qldanhmuc', [
    AdminController::class, 'qldanhmuc'
]);

//SAN PHAM
Route::get('/Administrator/qlsanpham',[
    AdminController::class, 'qlsanpham'
]);

Route::get('/Administrator/themsanpham',[
    AdminController::class, 'themsanpham'
]);
Route::post('/Administrator/themsanpham', [
    AdminController::class, 'nutThemSanPham'
]);


//---------

Route::get('/Administrator/{id}', [
    AdminController::class, 'store'
]);

Route::put('/Administrator/{id}', [
    AdminController::class, 'update'
]);


