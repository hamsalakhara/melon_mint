<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Creaters\CreaterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Creater\Auth\LoginController as AA;
use App\Http\Controllers\creater\CreaterForgotPasswordController as CreaterFP;

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
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPassword'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset.password.post');

Route::get('showLoginForm',[LoginController::class,'showLoginForm'])->name('showLoginForm');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('showCreater',[CreaterController::class,'showCreater'])->name('showCreater');

Route::get('createrLoginForm',[AA::class,'createrLoginForm'])->name('createrLoginForm');
Route::post('checkcreaterlogin',[AA::class,'checkcreaterlogin'])->name('checkcreaterlogin');


Route::get('forget-password', [CreaterFP::class, 'showForgetPassword'])->name('forget.password.get');
Route::post('forget-password', [CreaterFP::class, 'submitForgetPassword'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [CreaterFP::class, 'showResetPassword'])->name('reset.password.get');
Route::post('reset-password', [CreaterFP::class, 'submitResetPassword'])->name('reset.password.post');




