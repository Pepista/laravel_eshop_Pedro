<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/Contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/Questions', [QuestionController::class, 'index'])->name('question.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/search', [ProductController::class, 'search'])->name('products.search');

require __DIR__.'/auth.php';
