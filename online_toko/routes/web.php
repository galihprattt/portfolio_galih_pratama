<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Customer\AuthController as CustomerAuth;

// =====================
// Halaman Utama
// =====================
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// =====================
// Autentikasi Pelanggan
// =====================
Route::get('/login', [CustomerAuth::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [CustomerAuth::class, 'login'])->name('customer.login.submit');
Route::get('/register', [CustomerAuth::class, 'showRegisterForm'])->name('customer.register');
Route::post('/register', [CustomerAuth::class, 'register'])->name('customer.register.submit');
Route::post('/logout', [CustomerAuth::class, 'logout'])->name('customer.logout');

// =====================
// Fitur Cart, Checkout, Wishlist (Hanya untuk pengguna login)
// =====================
Route::middleware('auth:web')->group(function () {
    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart', [CartController::class, 'clear'])->name('cart.clear');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{product}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{product}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

// =====================
// Halaman sukses checkout (bebas akses)
// =====================
Route::get('/checkout-success', function () {
    return view('order.success');
})->name('checkout.success');

// =====================
// Autentikasi Admin
// =====================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// =====================
// Admin Panel (Login Admin Saja)
// =====================
Route::middleware(AdminAuth::class)->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');

    // Produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});