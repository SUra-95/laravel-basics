<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HandlePostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'register'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('posts', [PostController::class, 'posts'])->name('posts');
Route::get('create', [HandlePostController::class, 'create'])->name('create');
Route::post('posts/create', [HandlePostController::class, 'createPost'])->name('posts/create');
Route::get('edit/{id}', [HandlePostController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [HandlePostController::class, 'update'])->name('update');
// Route::post('posts/edit', [HandlePostController::class, 'edit'])->name('posts/edit');
Route::get('delete/{id}', [HandlePostController::class, 'delete'])->name('delete');
