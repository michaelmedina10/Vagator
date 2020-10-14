<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('jobs')->group(function(){
    Route::get('/',[JobController::class, 'index']);
    Route::get('/{id}',[JobController::class, 'show']);
    Route::post('/',[JobController::class, 'store']);
    Route::put('/{id}',[JobController::class, 'update']);
    Route::delete('/{id}',[JobController::class, 'delete']);
});