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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get/employee', 'EmployeeController@getEmployees')->name('api.get.employees'); 
Route::post('/delete/employee', 'EmployeeController@deleteEmployee')->name('api.delete.employee'); 
Route::get('/get/todo', 'TodoController@getTodo')->name('api.get.todo'); 
Route::post('/create/todo', 'TodoController@createTodo')->name('api.create.todo'); 
Route::post('/update/todo', 'TodoController@updateTodo')->name('api.update.todo'); 
Route::post('/delete/todo', 'TodoController@deleteTodo')->name('api.delete.todo'); 
