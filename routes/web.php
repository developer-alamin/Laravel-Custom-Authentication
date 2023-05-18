<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\profileController;
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

Route::get('test',[profileController::class,'test']);
