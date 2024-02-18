<?php

use Illuminate\Support\Facades\Route;

include __DIR__.'/fortify.php';
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
//MIDDLEWARE
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //DASHBOARD
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    //CATEGORIES
    Route::get('categories', function () {
        return view('statics.categories');
    })->middleware('can:categories.index')->name('categories');
    //PRODUCTS
    Route::get('products', function () {
        return view('statics.products');
    })->middleware('can:products.index')->name('products');
    //ORDERS
    Route::get('orders', function () {
        return view('statics.orders');
    })->middleware('can:orders.index')->name('orders');
    //SALES
    Route::get('sales', function () {
        return view('statics.sales');
    })->middleware('can:sales.index')->name('sales');
    //USUARIOS
    Route::get('users', function () {
        return view('statics.users');
    })->middleware('can:users.index')->name('users');
    //ROLES
    Route::get('roles', function () {
        return view('statics.roles');
    })->middleware('can:roles.index')->name('roles');
});
