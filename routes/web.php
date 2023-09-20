<?php

use App\Http\Controllers\Admin\AdminController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route
Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')->middleware('check.adminAuth');
Route::post('admin/login-check', [AdminController::class, 'adminLoginCheck'])->name('admin.loginCheck');

Route::group(['prefix'=>'admin', 'middleware'=>'auth:admin'], function(){
    Route::get('index', [AdminController::class, 'index'])->name('admin.dashboard');
});


