<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserRegisterController;
use Illuminate\Support\Facades\Route;
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/rent/{book}', [RentalController::class, 'rent'])->name('rent.book');
    Route::post('/return/{book}', [RentalController::class, 'return'])->name('return.book');
});
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginuser']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[UserRegisterController::class,'register'])->name('register');
Route::post('/register',[UserRegisterController::class,'newuser']);
Route::get('mybooks',[BookController::class,'mybooks'])->name('mybooks');