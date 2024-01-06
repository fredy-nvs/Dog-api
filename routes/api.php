<?php

use App\Http\Controllers\DogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/dogs", [DogController::class, 'index']);
Route::get("/dogs/{id}", [DogController::class, 'findById']);
Route::post("/dogs", [DogController::class, 'store']);
Route::put("/dogs/{id}", [DogController::class, 'update']);
Route::delete("/dogs/{id}", [DogController::class, 'delete']);
