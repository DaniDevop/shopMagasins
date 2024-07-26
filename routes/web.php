<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});



//

Route::controller(CategorieController::class)->group(function(){

    Route::get('/categories/listes','categories')->name('categories.listes');
    Route::post('/categories/ajouter','addCategorie')->name('categories.ajouter');
    Route::get('/categories/edit{id}','edit')->name('categories.edit');
    Route::post('/categories/update','update')->name('categories.update');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/listes','index')->name('product.listes');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/edit/{id}','edit')->name('product.edit');
    Route::post('/product/update', 'update')->name('product.update');

});
