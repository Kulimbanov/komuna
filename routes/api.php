<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TodoController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('project', ProjectController::class)
         ->only(['index', 'store', 'update', 'destroy']);
    Route::resource('project.todo', TodoController::class)
         ->only(['index', 'store', 'update']);
});
