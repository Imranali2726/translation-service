<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TranslationController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->prefix('translations')->group(function () {
    Route::get('/', [TranslationController::class, 'index']);
    Route::post('/', [TranslationController::class, 'store']);
    Route::put('{id}', [TranslationController::class, 'update']);
    Route::get('/export/{locale}', [TranslationController::class, 'export']);
});
