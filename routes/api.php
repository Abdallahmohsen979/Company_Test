<?php

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


Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginUser']);
Route::post('/logout', [\App\Http\Controllers\AythController::class, 'logout']);


Route::prefix('user')->group(function() {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'list']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'findById']);
    Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'delete']);
    Route::post('/create', [\App\Http\Controllers\UserController::class, 'store']);
    Route::post('/update/{id}', [\App\Http\Controllers\UserController::class, 'update']);

    
});
Route::prefix('company')->group(function() {
    Route::get('/', [\App\Http\Controllers\CompanyController::class, 'list']);
    Route::get('/{id}', [\App\Http\Controllers\CompanyController::class, 'findById']);
    Route::delete('/{id}', [\App\Http\Controllers\CompanyController::class, 'delete']);
    Route::post('/create', [\App\Http\Controllers\CompanyController::class, 'store']);
    Route::post('/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update']);



});
Route::prefix('company')->group(function() {
    Route::get('/', [\App\Http\Controllers\EmployeeController::class, 'list']);
    Route::get('/{id}', [\App\Http\Controllers\EmployeeController::class, 'findById']);
    Route::delete('/{id}', [\App\Http\Controllers\EmployeeController::class, 'delete']);
    Route::post('/create', [\App\Http\Controllers\EmployeeController::class, 'store']);
    Route::post('/update/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);



});
