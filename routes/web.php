<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\AdminController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}', [HomeController::class, 'product_details']);
Route::get('/shop', [HomeController::class, 'shop']);

Route::get('isAdmin', function(){
    if(Auth::user() && Auth::user()->usertype == '1'){
        return redirect('/admin');
    }
    return redirect('/');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('add_to_cart/{id}', [HomeController::class, 'add_cart'] );
    Route::get('cart', [HomeController::class, 'cart'] );
    Route::get('cart/delete/{id}', [HomeController::class, 'cart_delete']);
    Route::get('check-out', [OrderController::class, 'index'] );
    Route::post('order/stripe', [OrderController::class, 'stripe'] );
    Route::get('order', [OrderController::class, 'user_order'] );
});

Route::group(['prefix' => 'admin', 'middleware'=> [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'usertype'
]], function(){
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('/users', [AdminController::class, 'users']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);

    Route::get('/order', [OrderController::class, 'admin_order']);

});
