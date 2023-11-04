<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name("/");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::middleware('isUser')->group(function () {
        Route::get('/products/show', [\App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
        Route::get('/products/show/detail/{id}', [\App\Http\Controllers\ProductsController::class, 'showDetail'])->name('products.show.detail');
    });

    Route::middleware('productmanager')->group(function () {
        Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products');
        Route::get('/products/create', [\App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
        Route::post('/products/create', [\App\Http\Controllers\ProductsController::class, 'postCreate'])->name('products.postcreate');
        Route::get('/products/delete/{id}', [\App\Http\Controllers\ProductsController::class, 'delete'])->name('products.delete');
        Route::get('/products/update/{id}', [\App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
        Route::post('/products/update', [\App\Http\Controllers\ProductsController::class, 'postUpdate'])->name('products.post.update');
    });
});

require __DIR__.'/auth.php';
