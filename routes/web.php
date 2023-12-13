<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;


// For Frontend
Route::get('/',[FrontendController::class,'index'])->name('home');


// For Backend
Route::get('/dashboard',[BackendController::class,'index'])->name('dashboard');

// For Product Curd
Route::get('/addproduct',[ProductController::class,'index'])->name('addproduct');
Route::post('/insertproduct',[ProductController::class,'insert'])->name('storeproduct');
Route::get('/showproduct',[ProductController::class,'show'])->name('showproduct');
Route::get('/activeproduct/{id}',[ProductController::class,'active'])->name('activeproduct');
Route::get('/inactiveproduct/{id}',[ProductController::class,'inactive'])->name('inactiveproduct');
Route::get('/deleteproduct/{id}',[ProductController::class,'delete'])->name('deleteproduct');
Route::get('/editproduct/{id}',[ProductController::class,'edit'])->name('editproduct');
Route::post('/updateproduct/{id}',[ProductController::class,'update'])->name('updateproduct');



// Categoey ajax curd
Route::get('/manage',[CategoryController::class,'index'])->name('manage');
Route::post('/addcategory',[CategoryController::class,'storecat']);
Route::get('/showcategory',[CategoryController::class,'showcat']);
Route::get('/destroycategory/{id}',[CategoryController::class,'destroy']);
Route::get('/activecat/{id}',[CategoryController::class,'active']);
Route::get('/inactivecat/{id}',[CategoryController::class,'inactive']);
Route::get('/editcategory/{id}',[CategoryController::class,'edit']);
Route::post('/updatecategory/{id}',[CategoryController::class,'update']);

// Brand

Route::get('/addbrand',[BrandController::class,'index'])->name('addbrand');
Route::post('/storebrand',[BrandController::class,'store'])->name('storebrand');
Route::get('/showbrand',[BrandController::class,'show'])->name('showbrand');
Route::get('/viewbrand/{id}',[BrandController::class,'view'])->name('viewbrand');
Route::get('/edit/{id}',[BrandController::class,'edit'])->name('editbrand');
Route::post('/update/{id}',[BrandController::class,'update'])->name('updatebrand');
Route::get('/deletegallery/{id}',[BrandController::class,'deletegallery'])->name('deletegallery');
Route::post('/addgallery/{id}',[BrandController::class,'addgallery'])->name('addgallery');
Route::get('/deletebrand/{id}',[BrandController::class,'deletebrand'])->name('deletebrand');

// ajax img

Route::post('/insertbrand',[BrandController::class,'insert']);

