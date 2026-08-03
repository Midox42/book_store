<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
    })  ->name('welcome'); ;

Route::get('/posts', [PostController::class, 'posts'])->name('posts');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


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
