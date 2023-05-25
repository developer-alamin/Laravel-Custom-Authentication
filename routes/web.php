<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\adminLoginController;
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


Route::get('/',[usersController::class,'home'])->name('login')->Middleware('alreadyLogin');

Route::prefix('/users')->group(function(){
   Route::get('register',[usersController::class,'register'])->name('users.register')->Middleware('alreadyLogin');
   Route::post('storeRegister',[usersController::class,'storeRegister'])->name('user.storeRegister')->Middleware('alreadyLogin');
   Route::post('usersLogin',[usersController::class,'usersLogin'])->name('users.login')->Middleware('alreadyLogin');
   Route::get('logout',[usersController::class,'logout'])->name('logout');
   Route::get('verify/{token}',[usersController::class,'usersVerify']);
   Route::get('profile',[profileController::class,'profile'])->name('users.profile')->Middleware('loginCheck');
   Route::post('updateShow',[profileController::class,'updateShow'])->name('update.show');
   Route::post('update',[profileController::class,'update'])->name('user.update');
});



Route::group(['middleware'=>'useraccess'],function()
{
   Route::prefix('/admin')->group(function(){
      Route::get('/',[adminController::class,'adminHome'])->name('admin.home')->middleware('adminLogin');
      Route::get('users',[adminController::class,'adminUsers'])->name('admin.users');
      Route::get('/getusers',[adminController::class,'admingetusers'])->name('admin.admingetusers');
   
      Route::get('verifyed',[adminController::class,'adminVerifyed'])->name('admin.Verifyed');
      Route::get('getverifyed',[adminController::class,'admingetverifyed'])->name('admin.getverifyed');
   
      Route::get('non-verifyed',[adminController::class,'adminNonVerifyed'])->name('admin.NonVerifyed');
      Route::get('getnonverifyed',[adminController::class,'admingetnonverifyed'])->name('admin.getnonverifyed');
      Route::post('nonverifyDelete',[adminController::class,'nonverifyDelete'])->name('admin.nonveryfydel');
      Route::post('nonusersUpdateShow',[adminController::class,'nonusersUpdateShow'])->name('admin.nonuserupshow');
      Route::post('nonUserUpdate',[adminController::class,'nonUserUpdate'])->name('admin.nonUserUpdate');
   });
   
});

Route::prefix('/admin')->group(function()
{
  Route::get('login',[adminController::class,'login'])->name('adminform.login');
  Route::post('adminlogin',[adminLoginController::class,'adminlogin'])->name('admin.login'); 

  Route::get('register',[adminLoginController::class,'register'])->name('adminform.register');
  Route::post('adminstoreRegister',[adminLoginController::class,'adminstoreRegister'])->name('admin.storeRegister');

  Route::get('adminlogout',[adminLoginController::class,'adminlogout'])->name('admin.logout');
});


Route::get('test',[profileController::class,'test']);