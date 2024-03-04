<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

use function Ramsey\Uuid\v1;

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
Route::get('translate',function(){
    $lang = new GoogleTranslate('en');
    return $lang->setSource('en')->setTarget('vi')->translate("Hello World");
});
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
Route::get('/detailshop', function () {
    return view('Client.shopdetail');
});
Route::get('/testimonial', function () {
    return view('Client.testimonial');
});
Route::get('/checkout', function () {
    return view('Client.checkout');
});

Route::get('/login', function() {
    return view('Client.login');
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
Route::get('/Administrator/qlthanhtoan', [
    AdminController::class, 'qlthanhtoan'
]);
//Quan ly danh muc
Route::get('/Administrator/qldanhmuc', [
    AdminController::class, 'qldanhmuc'
]);
Route::get('/Administrator/themdanhmuc', [
    AdminController::class, 'themdanhmuc'
]);
Route::post('/Administrator/themdm', [
    AdminController::class, 'themdm'
]);

//SAN PHAM
Route::get('/Administrator/qlsanpham', [
    AdminController::class, 'qlsanpham'
]);

Route::get('/Administrator/themsanpham', [
    AdminController::class, 'themsanpham'
]);
Route::post('/Administrator/themsanpham', [
    AdminController::class, 'nutThemSanPham'
]);
Route::post('/Administrator/suamdm', [
    AdminController::class, 'suamdm'
]);
Route::get('/Administrator/{id}&sua', [
    AdminController::class, 'store'
]);
Route::get('/Administrator/{id}&xoa', [
    AdminController::class, 'destroy'
]);
Route::get('/Administrator/susanpham', [
    AdminController::class, 'suasanpham'
]);
Route::post('/Administrator/suasp', [
    AdminController::class, 'nutSuaSanPham'
]);

//---------

Route::get('/Administrator/{id}', [
    AdminController::class, 'store'
]);

Route::put('/Administrator/{id}', [
    AdminController::class, 'update'
]);

