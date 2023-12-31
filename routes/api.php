<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->group( function () {
    Route::apiResource('item',ItemController::class);
});

Route::post('signup',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
