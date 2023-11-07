<?php

use App\Http\Controllers\web\homeController;
use App\Http\Controllers\web\loginController;
use App\Http\Controllers\web\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class,'show'])->name('login');
Route::get('/Profile', [homeController::class,'profile']);
// Route::get('/products', [homeController::class,'products']);
Route::post('/register', [homeController::class,'registerPost']);
Route::post('/login', [loginController::class,'login']);
Route::get('/logout', [loginController::class,'logout']);


Route::middleware(['auth']) -> group(function(){
    Route::get('/dashboard',[homeController::class,'dashboard']);
    Route::get('/user',[homeController::class,'user']);
    Route::post('/user/simpan',[homeController::class,'userPost']);
    Route::get('/user/edit/{id}',[homeController::class,'userEdit']);
    Route::delete('/user/hapus/{id}',[homeController::class,'userHapus']);
    Route::get('/orders',[homeController::class,'orders']);

    Route::post('/product/simpan',[productController::class,'productPost']);
    Route::get('/products',[productController::class,'getProducts']);
    Route::post('/products/picture',[productController::class,'productPict']);
    Route::get('/products/edit/{id}',[productController::class,'productEdit']);
    Route::delete('/products/delete/{id}',[productController::class,'productDelProduct']);
    // Route::delete('/products/hapus/{id}',[homeController::class,'productsHapus']);
});

