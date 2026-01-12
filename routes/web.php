<?php

use App\Http\Controllers\api\v1\TodoController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');

Route::get('/search/{query}', [SearchController::class, 'search'])->name('todos.search');
