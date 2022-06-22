<?php

use Illuminate\Http\Request;
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
Route::get('/todos',[TodoController::class,'index']);
Route::prefix('todo')->group(function(){
    Route::post('storeTodo',[TodoController::class,'store']);
    Route::get('{id}/getTodo',[TodoController::class,'show']);
    Route::put('{id}/updateTodo',[TodoController::class,'update']);
    Route::delete('{id}/deleteTodo',[TodoController::class,'destroy']);
});
