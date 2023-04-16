<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, "ap_store"]);

Route::prefix('categories')->group(function(){

//Категории
Route::get('/', [CategoryController::class, 'categoriesList'])->name('categories.droad');
Route::get('create', [CategoryController::class, 'createCategory'])->name('categories.create');
Route::post('create', [CategoryController::class, 'storeCategory'])->name('categories.store');
Route::get('{categoryId}/edit', [CategoryController::class, 'editCategory'])->name('categories.edit');
Route::put('{categoryId}/edit', [CategoryController::class, 'updateCategory'])->name('categories.update');
Route::delete('{categoryId}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');


});



Route::prefix('Stores')->group(function(){

    //Список товара
    Route::get('/', [StoreController::class, 'index'])->name('card.index'); 
    Route::get('create', [StoreController::class, 'create'])->name('card.create'); 
    Route::post('create', [StoreController::class, 'store'])->name('store.create'); 
    Route::get('{storeId}', [StoreController::class, 'edit'])->name('edit.create'); 
    Route::put('{storeId}', [StoreController::class, 'update'])->name('update.create'); 
    Route::delete('{storeId}', [StoreController::class, 'delete'])->name('delete.create'); 
    Route::get('{storeSlug}/show', [StoreController::class, 'show'])->name('store.show'); 
    });





