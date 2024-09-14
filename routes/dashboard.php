<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardConroller;
use App\Http\Controllers\Dashboard\ProductController;

//Dashboard Route
Route::middleware(['auth' , 'isAdmin'])-> prefix('admin')->name('dashboard.')->group(function(){
    Route::get('/',[DashboardConroller::class ,'index'])->name('index');

    //Category Route
    Route::resource('categies', CategoryController::class);

    // product route
    Route::resource('/products', ProductController::class);


});

?>
