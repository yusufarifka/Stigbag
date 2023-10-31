<?php

use App\Http\Controllers\web\homeController;
use App\Http\Controllers\web\loginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [homeController::class,'show'])->name('login');
Route::get('/Profile', [homeController::class,'profile']);
Route::get('/products', [homeController::class,'products']);
Route::get('/orders', [homeController::class,'orders']);
Route::post('/register', [homeController::class,'registerPost']);
Route::post('/login', [loginController::class,'login']);
Route::get('/logout', [loginController::class,'logout']);


Route::middleware(['auth']) -> group(function(){
    Route::get('/dashboard',[homeController::class,'dashboard']);
    Route::get('/user',[homeController::class,'user']);
    Route::post('/user/simpan',[homeController::class,'userPost']);
    Route::get('/user/edit/{id}',[homeController::class,'userEdit']);
    Route::delete('/user/hapus/{id}',[homeController::class,'userHapus']);
    Route::post('/products/simpan',[homeController::class,'productsPost']);
    Route::get('/products/edit/{id}',[homeController::class,'productsEdit']);
    Route::delete('/products/hapus/{id}',[homeController::class,'productsHapus']);
});

