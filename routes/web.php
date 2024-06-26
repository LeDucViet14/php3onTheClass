<?php

use Illuminate\Support\Facades\Route;

// import UserController.php
use App\Http\Controllers\UserController;
use App\Http\Controllers\leducvietController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// GET POST => method HTTP

// http://127.0.0.1:8000/ => base url
Route::get('/list-user', [UserController::class, 'showUser']);

//slug
//http://127.0.0.1:8000/get-user/id/name
Route::get('/get-user/{id}/{name?}', [UserController::class, 'getUser']);

//params
//http://127.0.0.1:8000/update-user?id=1
Route::get('/update-user', [UserController::class, 'updateUser']);

Route::get('/thong-tin-sinh-vien', [leducvietController::class, 'informationStudent']);

