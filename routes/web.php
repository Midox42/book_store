
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BookController::class, 'home'])->name('index');
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

//// login and authentication

Route::get('/dashboard', [BookController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{book}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{item}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
});

require __DIR__.'/auth.php';
