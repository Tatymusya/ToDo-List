<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\TodoController;


Route::fallback(fn() => response()->json(['message' => 'Not Found!'], 404));

Route::prefix('v1')->group(function(){
    Route::apiResource('todos',TodoController::class);
});
