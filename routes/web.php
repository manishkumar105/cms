<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;





//auth controller route
Route::get('/',[AuthController::class,'showRegistration'])->name('auth.showRegistration');
Route::post('/registration',[AuthController::class,'registration'])->name('auth.registration');
Route::get('/login',[AuthController::class,'showLogin'])->name('auth.showLogin');
Route::post('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('auth.dashboard')->middleware('authMiddleware');
Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout');
//end auth controller route


// profile controller
Route::get('/profiles/{id}',[ProfileController::class,'index'])->name('profiles.index');
Route::get('/profiles/edit/{id}',[ProfileController::class,'edit'])->name('profiles.edit');
Route::put('/profiles/{id}',[ProfileController::class,'update'])->name('profiles.update');

// end profile controller

// post controller
Route::resource("posts",PostController::class)->except("show");
//soft delete data
Route::get('/posts/deletedpost',[PostController::class,'deletedPost'])->name('posts.deletedpost');
Route::put('/posts/{id}/restore',[PostController::class,"restoreSoftDelete"])->name('posts.restoreSoftDelete');

//end post controller








