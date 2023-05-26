<?php

use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Models\Store;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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

Route::middleware('locale')->group(function () {

    Route::get('/', [MainController::class, "ap_store"])->name('show.main');
    Route::get('lang/{lang}', [MainController::class, 'changeLocale'])->name('changeLang');
    Route::get('stores/{storeSlug}', [MainController::class, 'showStore'])->name('store_show');
    Route::get('add-to-cart/{store}', [CartController::class, 'addToCart'])->name('cart.add-store');
    Route::get('cart', [CartController::class, 'cartPage'])->name('cart');
    Route::put('cart/items/{item}/edit', [CartController::class, 'changeQty'])->name('cart.items.qty');

    Route::delete('cart/items/{item}', [CartController::class, 'destroy'])->name('cart.items.destroy');

    Route::post('cart/set-promocode', [CartController::class, 'applyPromocode'])->name('app.cart-promocode');
    Route::get('cart/unset-promocode', [CartController::class, 'cancelPromocode'])->name('app.cancel-promocode');
    Route::middleware(['auth',])->group(function () {


        Route::prefix('categories')->group(function () {
            //Категории
            Route::get('/', [CategoryController::class, 'categoriesList'])->middleware('permission:show-category')->name('categories.droad');
            Route::get('create', [CategoryController::class, 'createCategory'])->middleware('permission:create-category')->name('categories.create');
            Route::post('create', [CategoryController::class, 'storeCategory'])->name('categories.store');
            Route::get('{categoryId}/edit', [CategoryController::class, 'editCategory'])->middleware('permission:edit-category')->name('categories.edit');
            Route::put('{categoryId}/edit', [CategoryController::class, 'updateCategory'])->name('categories.update');
            Route::delete('{categoryId}', [CategoryController::class, 'deleteCategory'])->middleware('permission:delete-category')->name('categories.delete');



            Route::prefix('Stores')->group(function () {

                //Список товара
                Route::get('/', [StoreController::class, 'index'])->name('card.index');
                Route::get('create', [StoreController::class, 'create'])->middleware('permission:create-stores')->name('card.create');
                Route::post('create', [StoreController::class, 'store'])->name('store.create');
                Route::get('{storeId}', [StoreController::class, 'edit'])->middleware('permission:edit-stores')->name('edit.create');
                Route::put('{storeId}', [StoreController::class, 'update'])->name('update.create');
                Route::get('stores/{storeSlug}', [StoreController::class, 'show'])->name('store.show');
                Route::delete('{storeId}', [StoreController::class, 'delete'])->middleware('permission:delete-stores')->name('delete.create');
                Route::get('{storeId}/removeImage', [StoreController::class, 'removeImage'])->name('store.removeImage');
            });

            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index'])->middleware('permission:show-users')->name('users.index');
                Route::get('{user}/edit', [UserController::class, 'edit'])->middleware('permission:edit-users')->name('users.edit');
                Route::put('{user}/edit', [UserController::class, 'update'])->middleware('permission:create-users')->name('users.update');
            });

            Route::prefix('roles')->group(function () {
                Route::get('/', [RoleController::class, 'index'])->middleware('permission:show-roles')->name('roles.index');
                Route::get('create', [RoleController::class, 'create'])->middleware('permission:create-roles')->name('roles.create');
                Route::post('create', [RoleController::class, 'store'])->name('roles.store');
                Route::get('{role}/edit', [RoleController::class, 'edit'])->middleware('permission:edit-roles')->name('roles.edit');
                Route::put('{role}/edit', [RoleController::class, 'update'])->name('roles.update');
            });

            Route::prefix('permissions')->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
                Route::get('create', [PermissionController::class, 'create'])->name('permissions.create');
                Route::post('create', [PermissionController::class, 'store'])->name('permissions.store');
            });
        });


        Route::get('checkout', [OrderController::class, 'checkoutPage'])->name("checkout.app");
        Route::post('checkout', [OrderController::class, 'storeOrder'])->name("storeOrder.app");
        Route::get('order/{order}/thankyou', [OrderController::class, 'thankyouPage'])->name("thankyou.app");


        Route::get('orders', [OrderController::class, 'orders'])->name("admin.orders");


        Route::post('logout', [AuthController::class, 'logout'])->name("auth.logout");

        Route::prefix('admin')->group(function(){
        Route::resource('orders', AdminOrderController::class );

        Route::get('change-order-status/{order}', [AdminOrderController::class, 'changeStatus'])->name('order.change-status');
        });
    });





    Route::middleware(['guest'])->group(function () {

        Route::get('register', [AuthController::class, 'registerPage'])->name("auth.register");
        Route::post('register', [AuthController::class, 'storeUser'])->name("auth.storeUser");
        Route::get('login', [AuthController::class, 'loginPage'])->name("auth.login");
        Route::post('login', [AuthController::class, 'login'])->name("auth.loginUs");
    });


    Route::get('/', [MainController::class, 'card'])->name("card");


    Route::resource('groups', GroupController::class);
});
