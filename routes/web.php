<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Creaters\CreaterShowController;
use App\Http\Controllers\Admin\Assets\AssestShowController;
//use App\Http\Controllers\Admin\Creaters\UsershowController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\creater\Profile\ProfileController as CProfileController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\creater\Auth\CreaterForgotPasswordController as CreaterFP;
use App\Http\Controllers\Creater\Auth\LoginController as CLoginController;
use App\Http\Controllers\creater\dashboard\CreaterDashboardController as CreateDC;

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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('auth/gmail',[LoginController::class,'redirectToGmail'])->name('gmail');
Route::get('auth/gmail/callback', [LoginController::class,'handleGmailCallback']);
    

Route::middleware(['auth:admin'])->group(function ()
{
  Route::get('admindashboard',[DashboardController::class,'dashboard'])->name('admindashboard');
  Route::get('showCreater',[CreaterShowController::class,'showCreater'])->name('showCreater');
  //Route::get('showUsers',[UsershowController::class,'showUsers'])->name('showUsers');
  Route::get('showAssets',[AssestShowController::class,'showAssets'])->name('showAssets');
  Route::get('showProfile/{id}', [ProfileController::class, 'showProfile'])->name('showProfile');  
   Route::post('updateProfile/{id}', [ProfileController::class, 'updateProfile'])->name('updateProfile'); 

});

//cretaer
Route::get('/createrlogout', [CLoginController::class, 'createrlogout'])->name('createrlogout');
Route::get('createrLoginForm',[CLoginController::class,'createrLoginForm'])->name('createrLoginForm');
Route::post('checkcreaterlogin',[CLoginController::class,'checkcreaterlogin'])->name('checkcreaterlogin');
Route::middleware(['auth:creater'])->group(function ()
{
    Route::get('createdashboard',[CreateDC::class,'createdashboard'])->name('createdashboard');
    Route::get('creatershowProfile/{id}', [CProfileController::class, 'showProfile'])->name('creatershowProfile'); 
    Route::get('createrupdateProfile/{id}', [CProfileController::class, 'updateProfile'])->name('createrupdateProfile');  
});
Route::get('showForgetPassword', [CreaterFP::class, 'showForgetPassword'])->name('showForgetPassword');
Route::post('submitForgetPassword', [CreaterFP::class, 'submitForgetPassword'])->name('submitForgetPassword'); 
Route::get('reset-password/{token}', [CreaterFP::class, 'showResetPassword'])->name('showResetPassword');
Route::post('reset-password', [CreaterFP::class, 'submitResetPassword'])->name('submitResetPassword');





