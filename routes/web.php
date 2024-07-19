<?php

use Illuminate\Support\Facades\Route;

// import UserController.php
use App\Http\Controllers\UserController;
use App\Http\Controllers\leducvietController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

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


//http://127.0.0.1:8000/users/
Route::group( ['prefix' => 'users', 'as' => 'users.'] , function(){
    Route::get('list-user', [UserController::class, 'listUsers'])->name('listUsers');
    Route::get('add-user', [UserController::class, 'addUsers'])->name('addUsers');

    Route::post('add-user', [UserController::class, 'addPostUser'])->name('addPostUser');

    Route::get('delete-user/{idUser}', [UserController::class, 'deleteUser'])->name('deleteUser');


});

Route::group( ['prefix' => 'product', 'as' => 'product.'], function() {
    Route::get('list-product', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::get('delete-product/{idProduct}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    
    Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
    Route::post('update-product', [ProductController::class, 'updatePostProduct'])->name('updatePostProduct');
});


Route::get('test', [ProductController::class, 'test']);


