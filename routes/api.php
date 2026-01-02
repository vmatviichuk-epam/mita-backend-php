<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| All routes are prefixed with /api.
|
*/

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    
    // TODO: Implement these routes
    // Route::post('/register', [AuthController::class, 'register']);
    // Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

// Protected routes (TODO: add auth:sanctum middleware)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('issues', IssueController::class);
// });
