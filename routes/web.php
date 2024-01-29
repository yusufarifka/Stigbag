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
Route::get('/product',[homeController::class,'produk']);
Route::get('getProduct',[homeController::class,'getProducts']);
Route::get('getPicture',[homeController::class,'getPictures']);
// Route::get('getProducts',[homeController::class,'getProducts']);


Route::middleware(['auth']) -> group(function(){
    Route::get('admin/dashboard',[homeController::class,'dashboard']);
    Route::get('/admin/user',[homeController::class,'user']);
    Route::post('/user/simpan',[homeController::class,'userPost']);
    Route::get('/user/edit/{id}',[homeController::class,'userEdit']);
    Route::delete('/user/hapus/{id}',[homeController::class,'userHapus']);


    Route::post('/product/simpan',[productController::class,'productPost']);
    Route::get('/admin/products',[productController::class,'getProducts']);
    Route::post('/products/picture',[productController::class,'productPict']);
    Route::get('/products/edit/{id}',[productController::class,'productEdit']);
    Route::delete('/products/delete/{id}',[productController::class,'productDelProduct']);
    // Route::delete('/products/hapus/{id}',[homeController::class,'productsHapus']);
});

