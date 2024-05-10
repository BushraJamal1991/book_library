<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home', [BookController::class, 'index'])->name('home');
    Route::get('/create_book', [BookController::class, 'create'])->name('create_book');
    Route::post('/store_book', [BookController::class, 'store'])->name('store_book');
    Route::get('/add_main_category', [CategoryController::class, 'create'])->name('add_main_category');
    Route::post('/store_main_category', [CategoryController::class, 'store'])->name('store_main_category');
    Route::get('/add_sub_category', [CategoryController::class, 'create_sub'])->name('add_sub_category');
    Route::post('/store_sub_category', [CategoryController::class, 'store_sub'])->name('store_sub_category');
});


   


