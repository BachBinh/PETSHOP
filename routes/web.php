<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\{AdminController, ProductController,DanhmucController, OrderController};

use App\Http\Controllers\{
    HomeController,
    AuthController,
    OrderViewController,
    CartController
};


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

// Frontend routes
Route::get('/', [HomeController::class, 'index']);

Route::get('/sanpham/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/congiong', [HomeController::class, 'congiong']);
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/viewAll', [HomeController::class, 'viewAll'])->name('viewAll');
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Cart routes
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('cart/add-go-to-cart/{id}', [CartController::class, 'addGoToCart'])->name('add_go_to_cart');
Route::put('cart/update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('cart/remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/dathang', [CartController::class, 'dathang'])->name('dathang');
Route::post('/vnpay', [CartController::class, 'vnpay'])->name('vnpay');
Route::get('/thongbaodathang', [CartController::class, 'thongbaodathang'])->name('thongbaodathang');

// Order routes
Route::get('/donhang', [OrderViewController::class, 'donhang']);

// Authentication routes
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/signinDashboard', [AdminController::class, 'signin_dashboard']);

// Protected admin routes
Route::middleware('admin.login')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin_logout', [AdminController::class, 'admin_logout']); 

    // Product routes
    Route::resource('admin/products', ProductController::class);

    // Category routes
    Route::resource('admin/danhmucs', DanhmucController::class);

    // Order routes
    Route::resource('admin/orders', OrderController::class);
});
