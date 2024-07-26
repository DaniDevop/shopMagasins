<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});


Route::get('/categories/listes',[CategorieController::class,'categories'])->name('categories.listes');
Route::post('/categories/ajouter',[CategorieController::class,'addCategorie'])->name('categories.ajouter');
Route::get('/categories/edit{id}',[CategorieController::class,'edit'])->name('categories.edit');
Route::post('/categories/update',[CategorieController::class,'update'])->name('categories.update');
