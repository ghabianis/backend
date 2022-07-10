<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
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


Route::controller(AuthController::class)->group(function () {
    Route::post('login',[App\Http\Controllers\AuthController::class,'login']);
    Route::post('register',[App\Http\Controllers\AuthController::class,'register']);
    Route::post('logout',[App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh',[App\Http\Controllers\AuthController::class,'refresh']    );
    Route::post('createUserAppointment',[App\Http\Controllers\Controller::class,'createUserAppointment']);
    Route::get('getAppointment',[App\Http\Controllers\Controller::class,'getAppointment']);
    Route::get('getDoctors',[App\Http\Controllers\Controller::class,'getDoctors']);
    Route::delete('deleteUser/{id}',[App\Http\Controllers\AuthController::class,'deleteUser']);
    Route::get('getAllUsers',[App\Http\Controllers\AuthController::class,'getAllUsers']);


});



Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});
