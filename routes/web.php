<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\{
    AdminController, ProductController, DanhmucController, OrderController, CustomerController
};

use App\Http\Controllers\{
    HomeController, AuthController, OrderViewController, CartController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ========================== FRONTEND ==========================
Route::get('/', [HomeController::class, 'index']);

Route::get('/sanpham/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/All', [HomeController::class, 'viewAll'])->name('viewAll');
Route::get('/tintuc', [HomeController::class, 'services'])->name('services');
Route::get('/danhmuc', [HomeController::class, 'danhmuc'])->name('danhmuc');
Route::get('/danhmuc/{id}', [HomeController::class, 'showProductsByDanhMuc'])->name('danhmuc.show');

// ========================== CART ==========================
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('add-go-to-cart/{id}', [CartController::class, 'addGoToCart'])->name('add_go_to_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/dathang', [CartController::class, 'dathang'])->name('dathang');
Route::post('/vnpay', [CartController::class, 'vnpay'])->name('vnpay');
Route::get('/thongbaodathang', [CartController::class, 'thongbaodathang'])->name('thongbaodathang');

// ========================== ORDER ==========================
Route::get('/donhang', [OrderViewController::class, 'donhang']);

Route::middleware('orderview')->group(function () {
    Route::get('/donhang/edit/{id}', [OrderViewController::class, 'edit'])->name('donhang.edit');
});

// ========================== AUTH ==========================
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// ========================== ADMIN LOGIN ==========================
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/signinDashboard', [AdminController::class, 'signin_dashboard']);

Route::middleware('admin.login')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin_logout', [AdminController::class, 'admin_logout']);

    // PRODUCTS
    Route::prefix('admin/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/search', [AdminController::class, 'search'])->name('adminSearch');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    // DANH MUC
    Route::prefix('admin/danhmuc')->group(function () {
        Route::get('/', [DanhmucController::class, 'index'])->name('danhmuc.index');
        Route::get('/create', [DanhmucController::class, 'create'])->name('danhmuc.create');
        Route::post('/', [DanhmucController::class, 'store'])->name('danhmuc.store');
        Route::get('/edit/{danhmuc}', [DanhmucController::class, 'edit'])->name('danhmuc.edit');
        Route::put('/update/{danhmuc}', [DanhmucController::class, 'update'])->name('danhmuc.update');
        Route::delete('/{danhmuc}/destroy', [DanhmucController::class, 'destroy'])->name('danhmuc.destroy');
        Route::get('/search', [AdminController::class, 'searchDanhmuc'])->name('danhmucs.search');
    });

    // ORDERS
    Route::prefix('admin/orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/edit/{orders}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/update/{orders}', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/search', [AdminController::class, 'searchOrders'])->name('orders.search');
    });

    // CUSTOMERS
    Route::prefix('admin/customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/{id_kh}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    // CUSTOMERS - Alternative routes (possibly different role or purpose)
    Route::get('admin/customers/search', [AdminController::class, 'searchCustomer'])->name('customers.search');
    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('customers.index');
});

// ========================== FOOTER STATIC PAGES ==========================
Route::view('/he-thong-cua-hang', 'pages.hethongcuahang');
Route::view('/huong-dan-mua-hang', 'pages.huongdanmuahang');
Route::view('/huong-dan-giao-nhan', 'pages.huongdangiaonhan');
Route::view('/huong-dan-thanh-toan', 'pages.huongdanthanhtoan');
Route::view('/dieu-khoan-dich-vu', 'pages.dieukhoandichvu');
Route::view('/chinh-sach-bao-mat', 'pages.chinhsachbaomat');
Route::view('/chinh-sach-van-chuyen', 'pages.chinhsachvanchuyen');
Route::view('/chinh-sach-doi-tra', 'pages.chinhsachdoitra');
Route::view('/quy-dinh-su-dung', 'pages.quydinhsudung');
