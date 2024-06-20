<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/apps',function(){
    return view('layouts.app');
});


// Authentication
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::get('/login',[UserController::class, 'login'])->name('login');

Route::get('/dashboards', function () {
    return view('dashboard.index');
});

//post routes

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/dashboard/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/dashboard/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
Route::delete('/dashboard/posts/{post}/delete', [PostController::class, 'delete'])->name('post.delete');

//categories routes
Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);



