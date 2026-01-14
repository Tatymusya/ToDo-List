<?php

use App\Http\Controllers\api\v1\TodoController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Resources\v1\TodoResource;
use App\Http\Requests\v1\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Client\Request;
use Inertia\Inertia;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');

Route::get('/search/{query}', [SearchController::class, 'search'])->name('todos.search');

Route::get('/salary', [SalaryController::class, 'index'])->name('todos.salary');
