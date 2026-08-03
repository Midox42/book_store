<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\bookController;

Route::get('/', function () {
    return view('welcome');
    })  ->name('welcome'); ;

Route::get('/books', [bookController::class, 'books'])->name('books');
Route::get('/books/create', [bookController::class, 'create'])->name('books.create');
Route::book('/books', [bookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [bookController::class, 'show'])->name('books.show');
// Route::get('/books/edit/{book}', [bookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [bookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [bookController::class, 'destroy'])->name('books.destroy');


// About Us route
Route::get('/about-us', function () {
    return view('about');
})->name('about.us'); // Route comment added (line 13)

Route::get('/test', function () {
    return view('test_view', [
        'person' => 'jake',
        'otherData' => request('otherData', 'hi'),
    ]);
})->name('test');
