<?php

use App\Http\Controllers\APIs\ProjectsController;
use App\Http\Controllers\APIs\TasksController;
use App\Http\Controllers\APIs\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

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


Route::Group(['prefix'=>'users'],function(){
    Route::Group(['prefix'=>'','middleware'=>'guest:sanctum'],function(){
        Route::post('login',[UsersController::class,'login']);
        Route::post('register',[UsersController::class,'register']);
        Route::post('forget-password',[UsersController::class,'forgetPassword']);
    });
    Route::Group(['prefix'=>'','middleware'=>'auth:sanctum'],function(){
        Route::get('edit',[UsersController::class,'edit']);
        Route::put('update',[UsersController::class,'update']);
        Route::delete('delete',[UsersController::class,'delete']);
        Route::post('change-password',[UsersController::class,'changePassword']);
        Route::get('forget-password',[UsersController::class,'forgetPassword']);
        Route::get('logout-from-all-devices',[UsersController::class,'logoutFromAllDevices']);
        Route::get('logout',[UsersController::class,'logout']);
    });
});

Orion::resource('projects', ProjectsController::class);
Orion::resource('tasks', TasksController::class);
