<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 
    [ProductController::class,'index']
)->middleware(['auth'])->name('dashboard');

Route::get('/addtocart/{id}', 
    [ProductController::class,'addtocart']
)->middleware(['auth'])->name('addtocart');
Route::get('/cart', 
    [ProductController::class,'cart']
)->middleware(['auth'])->name('cart');

Route::post('/makeorder', 
    [OrderController::class,'makeorder']
)->middleware(['auth'])->name('makeorder');
//
Route::get('/confirmation', 
[OrderController::class,'confirmation']
)->middleware(['auth'])->name('confirmation');
require __DIR__.'/auth.php';
