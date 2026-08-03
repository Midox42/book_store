<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'home'])->name('welcome');
Route::get('/books', [BookController::class, 'books'])->name('books');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// About Us route
Route::get('/about-us', [BookController::class, 'about'])->name('about.us');

Route::get('/test', function () {
    return view('test_view', [
        'person' => 'jake',
        'otherData' => request('otherData', 'hi'),
    ]);
})->name('test');
