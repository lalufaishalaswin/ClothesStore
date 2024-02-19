<?php

use App\Http\Controllers\ClothesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);


Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/manageClothes', [ClothesController::class, 'index'])->middleware('seller');
Route::post('/manageClothes', [ClothesController::class, 'store'])->middleware('seller');
Route::post('/deleteClothes/{clothes}', [ClothesController::class, 'destroy'])->middleware('seller');
Route::get('/detailClothes/{clothes}', [ClothesController::class, 'show']);
Route::post('/updateClothes/{clothes}', [ClothesController::class, 'update'])->middleware('seller');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth');
Route::post('/profile/{user}', [UserController::class, 'update'])->middleware('auth');
Route::get('/changePassword/{user}', [UserController::class, 'changePassword'])->middleware('auth');
Route::post('/changePassword/{user}', [UserController::class, 'updatePassword'])->middleware('auth');

Route::get('/manageUser', [UserController::class, 'showUser'])->middleware('seller');
Route::post('/deleteUser/{user}', [UserController::class, 'deleteUser'])->middleware('seller');
Route::get('/userDetail/{user}', [UserController::class, 'userDetail'])->middleware('seller');
Route::post('/userUpdate/{user}', [UserController::class, 'userUpdate'])->middleware('auth');

Route::get('/cart', [UserController::class, 'cart'])->middleware('buyer');
Route::post('/addToCart/{clothes}', [UserController::class, 'addtoCart'])->middleware('buyer');
Route::post('/deleteCart', [UserController::class, 'deleteCart'])->middleware('buyer');

Route::get('/checkout',[UserController::class,'checkout'])->middleware('buyer');

Route::get('/transactionHistory', [UserController::class,'transactionHistory'])->middleware('buyer');
Route::get('/transactionDetail/{transaction}', [UserController::class,'transactionDetail'])->middleware('buyer');




