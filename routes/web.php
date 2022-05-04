<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('', function () {
    return view('welcome');
});

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');

    // products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::delete('products_mass_destroy', [\App\Http\Controllers\Admin\ProductController::class, 'massDestroy'])->name('products.mass_destroy');
    Route::post('products/images', [\App\Http\Controllers\Admin\ProductController::class, 'storeImage'])->name('products.storeImage');
    Route::post('products/search', [\App\Http\Controllers\Admin\ProductController::class, 'search'])->name('products.search');

    // pos
    Route::get('pos', [\App\Http\Controllers\Admin\PosController::class, 'index'])->name('pos.index');
    
    // carts
    Route::resource('carts', \App\Http\Controllers\Admin\CartController::class);
    Route::post('carts/scan', [\App\Http\Controllers\Admin\CartController::class, 'scan'])->name('carts.scan');

    // transaction
    Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}/print_struck', [\App\Http\Controllers\Admin\TransactionController::class, 'print_struck'])->name('transactions.print_struck');
    Route::post('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('transactions.store');
    Route::get('transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'show'])->name('transactions.show');
    Route::delete('transactions/{transaction}', [\App\Http\Controllers\Admin\TransactionController::class, 'destroy'])->name('transactions.destroy');

    // report
    Route::get('reports/revenue', [\App\Http\Controllers\Admin\ReportController::class, 'revenue'])->name('reports.revenue');
});

Auth::routes();

