<?php

use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::get('/notes', [NoteController::class, 'all']);

    Route::post('/notes', [NoteController::class, 'store']);

    Route::get('/notes/{id}', [NoteController::class, 'show']);

    Route::post('/notes/{id}', [NoteController::class, 'update']);

    Route::delete('/notes/{id}', [NoteController::class, 'delete']);

    Route::get('/categories', [CategoryController::class, 'all']);

    Route::post('/categories', [CategoryController::class, 'store']);

    Route::get('/categories/{id}', [CategoryController::class, 'show']);

    Route::post('/categories/{id}', [CategoryController::class, 'update']);

    Route::delete('/categories/{id}', [CategoryController::class, 'delete']);
});
