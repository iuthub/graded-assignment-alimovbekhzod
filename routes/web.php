<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("tasks", "TaskController@index")->middleware("auth");
Route::post("tasks", "TaskController@store");
Route::get("{taskID}/edit", "TaskController@edit");
Route::patch("tasks/{taskID}", "TaskController@update");
Route::get("delete/{task}", "TaskController@delete");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
