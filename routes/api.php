<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderViewController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;

// Route cho AuthController
Route::post('register', [AuthController::class, 'registerPost']);
Route::post('login', [AuthController::class, 'loginPost']);
Route::delete('logout', [AuthController::class, 'logout']);

// Route cho CartController
Route::get('products', [CartController::class, 'index']);
Route::get('cart', [CartController::class, 'cart']);
Route::post('cart/{id}', [CartController::class, 'addToCart']);
Route::patch('cart', [CartController::class, 'update']);
Route::delete('cart', [CartController::class, 'remove']);
Route::post('checkout', [CartController::class, 'checkout']);
Route::post('dathang', [CartController::class, 'dathang']);
Route::get('thongbaodathang', [CartController::class, 'thongbaodathang']);
Route::post('vnpay', [CartController::class, 'vnpay']);

// Route cho HomeController
Route::get('home', [HomeController::class, 'index']);
Route::get('congiong', [HomeController::class, 'congiong']);
Route::get('detail/{id}', [HomeController::class, 'detail']);
Route::get('search', [HomeController::class, 'search']);
Route::get('viewall', [HomeController::class, 'viewAll']);
Route::get('services', [HomeController::class, 'services']);

// Route cho OrderViewController
Route::get('donhang', [OrderViewController::class, 'donhang']);
Route::get('donhang/{id}', [OrderViewController::class, 'edit']);

//Route cho Admin
Route::prefix('admin')->group(function () {
    Route::post('login', [AdminController::class, 'login']);
    Route::post('logout', [AdminController::class, 'logout']);
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    Route::post('search', [AdminController::class, 'search']);
});

//Route cho danh muc
Route::prefix('danhmucs')->group(function () {
    Route::get('/', [DanhmucController::class, 'index']);
    Route::post('/', [DanhmucController::class, 'store']);
    Route::get('/{id}', [DanhmucController::class, 'show']);
    Route::put('/{id}', [DanhmucController::class, 'update']);
    Route::delete('/{id}', [DanhmucController::class, 'destroy']);
});

//Route cho order
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::put('/{id}', [OrderController::class, 'update']);
});

//Route cho product
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});