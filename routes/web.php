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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class,'index'])->name('user.list');
Route::get('/user/create', [UserController::class,'create'])->name('user.create');
Route::post('/user/create', [UserController::class,'store']);
Route::get('/user/edit/{id}', [UserController::class,'show'])->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class,'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class,'destroy'])->name('user.delete');
