<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('home.index');
});

//post routes

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('post.delete');

//categories routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);



