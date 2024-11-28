<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;



Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::apiResource('tasks', TaskController::class);