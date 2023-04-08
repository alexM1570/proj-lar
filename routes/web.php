<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
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


//Категории
Route::get('categories', [CategoryController::class, 'categoriesList'])->name('categories.droad');
Route::get('categories/create', [CategoryController::class, 'createCategory'])->name('categories.create');
Route::post('categories/create', [CategoryController::class, 'storeCategory'])->name('categories.store');