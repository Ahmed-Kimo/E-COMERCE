<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpinionController;

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

Route::prefix('ecommerce')->group(function(){

    Route::get('/homepage', [FirstController::class , 'getAllCategories'])->name('homePage');

    Route::get('/products/{cateid?}', [FirstController::class , 'getProducts'])->name('products');

    Route::get('/category', [FirstController::class , 'getCatePro'])->name('category');

    Route::get('/addproduct', [ProductController::class , 'addProduct'])->name('addproduct');
    Route::get('/removeproduct/{productid}', [ProductController::class , 'destroyProduct'])->name('removeproduct');
    Route::get('/editproduct/{productid}', [ProductController::class , 'editProduct'])->name('editproduct');
    Route::put('/updateproduct/{productid}', [ProductController::class , 'updateProduct'])->name('updateproduct');
    Route::Post('/storeproduct', [ProductController::class , 'storeProduct'])->name('storeproduct');


    // Giving Opinion

Route::resource('opinions', OpinionController::class);


}); 
