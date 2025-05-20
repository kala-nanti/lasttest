<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [BookController::class, 'index']);

Route::resource('books', BookController::class);


Route::resource('books', BookController::class); // [cite: 19]
Route::resource('borrowings', BorrowingController::class); // Tambahkan route untuk borrowings