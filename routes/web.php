<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route
Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')->middleware('check.adminAuth');
Route::post('admin/login-check', [AdminController::class, 'adminLoginCheck'])->name('admin.loginCheck');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('all-admin', [AdminController::class, 'allAdmin'])->name('all.admin');
    Route::get('create-admin', [AdminController::class, 'createAdmin'])->name('create.admin');

    Route::get('all-admin-data-ajax', [AdminController::class, 'getAllAdmin'])->name('all.get_ajax_admin');
    Route::post('/admin_register_ajax', [AdminController::class, 'create_admin_ajax'])->name('admin.create_ajax');

    Route::post('store-admin', [AdminController::class, 'storeAdmin'])->name('store.admin');
    Route::post('update-ajax/{id}', [AdminController::class, 'update_admin_ajax']);
    Route::delete('delete-ajax/{id}', [AdminController::class, 'delete_admin_ajax']);

});
