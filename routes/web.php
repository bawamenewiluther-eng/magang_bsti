<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthorController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('books', BooksController::class);

Route::resource('categories', CategoriesController::class);

Route::resource('authors', AuthorController::class);