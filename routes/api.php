<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});


Route::group([
    'middleware' => 'api',
    //'namespace' => 'App\Http\Controllers\Api',
   'prefix' => 'auth'

], function ($router) {
    Route::post('/register', AuthController::class,'register');
    Route::post('/login', AuthController::class,'login');
    Route::post('/logout', AuthController::class,'logout');
    Route::post('/refresh',AuthController::class,'refresh');
    Route::post('/me', AuthController::class,'me');
});



Route::middleware(['jwt.verify'])->group(function(){
    Route::get('/rates',[RateController::class,'index']);
    Route::post('/rates/add',[RateController::class,'store']);
    Route::get('/favorites',[FavoriteController::class,'index']);
    Route::post('/favorites/add',[FavoriteController::class,'store']);
});

Route::get('/books',[BookController::class,'index']);
Route::get('/book/{id}',[BookController::class,'show']);

Route::get('filterbycategory/{id}',[BookController::class,'filterByCategory']);
Route::get('filterbysubcategory/{id}',[BookController::class,'filterBySubCategory']);


//Route::group(['middleware' => ['auth','user']], function () {

//Route::get('/rates',[RateController::class,'index']);
//Route::post('/rates/add',[RateController::class,'store']);
//Route::get('/favorites',[FavoriteController::class,'index']);
//Route::post('/favorites/add',[FavoriteController::class,'store']);
//});

