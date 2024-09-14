<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardConroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Paymants\PaypalController;

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


Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/category', [HomeController::class , 'category'])->name('category');
Route::get('/products/{id}', [HomeController::class , 'products'])->name('products.show');

// cart route:
Route::get('/cart', [CartController::class , 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class , 'add'])->name('cart.add');



Route::get('signin',[HomeController::class , 'signin'])->name('signin');
Route::get('signup',[HomeController::class , 'signup'])->name('signup');

Route::get('chekout/{order}',[CheckController::class , 'index'])->name('chekout');
Route::post('order/store', [OrderController::class , 'store'])->name('order.store');

// PayPal Route:
Route::get('paypal/create/{order}', [PaypalController::class , 'create'])->name('paypal.create');
Route::get('paypal/cancel/{order}', [PaypalController::class , 'cancel'])->name('paypal.cancel');
Route::get('paypal/return/{order}', [PaypalController::class , 'callback'])->name('paypal.return');



// Route::get('/admin', function () {
//     return view('dashboard.index');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
