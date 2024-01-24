<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', \App\Http\Controllers\TaskController::class);
Route::patch('tasks/{id}/status', [\App\Http\Controllers\TaskController::class, 'updateStatus']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
