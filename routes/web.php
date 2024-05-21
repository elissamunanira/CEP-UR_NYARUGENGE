<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

//post routes

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts/store', [PostController::class,'store'])->name('post.store');
Route::get('posts/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/update',[PostController::class,'update'])->name('post.update');

//categories routes

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::get('category/edit',[CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/update',[CategoryController::class, 'update'])->name('category.update');


