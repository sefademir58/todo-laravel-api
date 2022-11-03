<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;

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

Route::controller(TodoController::class)->group(function() {
    Route::get('/list', 'index');
    Route::post('/add', 'store');
    Route::put('/todo/{id}/completed/{status}','status');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login');
    Route::post('/register', 'register');
});