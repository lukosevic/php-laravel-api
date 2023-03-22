<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all',[TodoController::class,'tasks']);
Route::post('/add-task',[TodoController::class,'addTask']);
Route::get('/task/delete/{id}',[TodoController::class,'delete']);
Route::post('/task/update/{id}',[TodoController::class,'update']);


//Auth

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']],function ()
{
    Route::post('logout',[AuthController::class,'logout']);
});