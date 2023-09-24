<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Backend Route
Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')->middleware('check.adminAuth');
Route::post('admin/login-check', [AdminController::class, 'adminLoginCheck'])->name('admin.loginCheck');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //Admin Section
    Route::get('all-admin', [AdminController::class, 'allAdmin'])->name('all.admin');
    Route::get('create-admin', [AdminController::class, 'createAdmin'])->name('create.admin');
    Route::post('store-admin', [AdminController::class, 'storeAdmin'])->name('store.admin');

    Route::get('all-admin-ajax', [AdminController::class, 'getAllAdmin'])->name('all.admin_ajax');
    Route::post('create-admin-ajax', [AdminController::class, 'create_admin_ajax'])->name('create.admin_ajax');
    Route::post('update-ajax/{id}', [AdminController::class, 'update_admin_ajax']);
    Route::delete('delete-ajax/{id}', [AdminController::class, 'delete_admin_ajax']);

    //Order Section
    Route::get('order-index', [OrderController::class, 'index'])->name('order.index');

    //Product Section
    Route::get('product-index', [ProductController::class, 'index'])->name('product.index');
    Route::post('product-store', [ProductController::class, 'storeProduct'])->name('product.store');
    Route::post('product-update/{id}', [ProductController::class, 'updateProduct']);
    Route::post('product-delete/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('/product-pagination/paginate-data', [ProductController::class, 'paginationProductAjax']);
});
