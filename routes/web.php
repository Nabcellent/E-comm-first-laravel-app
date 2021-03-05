<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

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

Route::view('/register', 'register');



Route::get('/login', function () {
    return view('login');
});

Route::get('/sign-out', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/', [productController::class, 'index']);

Route::get('/details/{id}', [productController::class, 'details']);

Route::get('/search', [productController::class, 'search']);

Route::get('/cart', [productController::class, 'cart']);

Route::get('/remove-cart/{id}', [productController::class, 'removeCart']);

Route::get('/order', [productController::class, 'order']);

Route::get('/my-orders', [productController::class, 'myOrders']);



Route::post('/login', [userController::class, 'login']);

Route::post('/register', [userController::class, 'register']);

Route::post('/add-cart', [productController::class, 'addToCart']);

Route::post('/checkout', [productController::class, 'checkout']);
