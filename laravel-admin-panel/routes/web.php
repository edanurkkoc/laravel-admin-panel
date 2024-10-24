<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/genel-gorunum',[AdminController::class,'index'])->name('admin.index')->middleware('auth');
Route::get('/admin',[AdminController::class,'login'])->name('admin.login');
Route::get('/admin/kayit-ol',[AdminController::class,'register'])->name('admin.register');
Route::get('/admin/sifremi-unuttum',[AdminController::class,'forgotpassword'])->name('admin.forgotpassword');

Route::post('/admin/login',[MemberController::class,'login'])->name('admin.login.post');
Route::get('/admin/logout',[MemberController::class,'logout'])->name('admin.logout');
Route::post('/admin/register',[MemberController::class,'register'])->name('admin.register.post');

Route::get('/admin/kullanicilar',[UserController::class,'index'])->name('admin.users.index')->middleware('auth');
Route::get('/admin/kullanicilar/{user}',[UserController::class,'show'])->name('admin.users.show')->middleware('auth');
Route::post('/admin/kullanicilar/{user}',[UserController::class,'updatePermissions'])->name('admin.users.updatepermissions')->middleware('auth');

Route::get('/admin/urunler',[ProductController::class,'index'])->name('admin.products.index')->middleware('auth');
Route::get('/admin/urunler/ekle',[ProductController::class,'create'])->name('admin.products.create')->middleware('auth');
Route::post('/admin/urunler/ekle',[ProductController::class,'store'])->name('admin.products.store')->middleware('auth');
Route::get('/admin/urunler/duzenle/{id}',[ProductController::class,'edit'])->name('admin.products.edit')->middleware('auth');
Route::post('/admin/urunler/duzenle/{id}',[ProductController::class,'update'])->name('admin.products.update')->middleware('auth');
Route::get('/admin/urunler/sil/{id}',[ProductController::class,'destroy'])->name('admin.products.destroy')->middleware('auth');