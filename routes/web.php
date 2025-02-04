<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ViewController;

Route::get('/whatsapp', function () {
    return redirect('https://wa.me/6281385377823');
})->name('whatsapp');

// Public Routes
Route::get('/', [ViewController::class, 'home'])->name('home');
Route::get('/about', [ViewController::class, 'about'])->name('about');
Route::get('/product', [ViewController::class, 'product'])->name('product');
Route::get('/get-products', [ViewController::class, 'getProducts']);
Route::get('/blog', [ViewController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [ViewController::class, 'showBlogDetail'])->name('blog.detail');
Route::get('/contact', [ViewController::class, 'contact'])->name('contact');
Route::get('/product/{slug}', [ViewController::class, 'showProductDetail'])->name('product.detail');

// Rute Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang membutuhkan autentikasi dan role admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboards', [AuthController::class, 'dashboard'])->name('dashboard');
    
    Route::resource('admin/products', ProductController::class);
    Route::post('admin/products/delete', [ProductController::class, 'delete'])->name('products.delete');

    Route::resource('admin/categories', CategoryController::class);
    Route::post('admin/categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::resource('admin/clients', ClientController::class);
    Route::post('admin/clients/delete', [ClientController::class, 'delete'])->name('clients.delete');

    Route::resource('admin/blogs', BlogController::class);
    Route::post('admin/blogs/delete', [BlogController::class, 'delete'])->name('blogs.delete');
});
