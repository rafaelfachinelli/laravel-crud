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

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Auth::routes([
      'register' => true,
      'reset' => true,
    ]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/transactions', [App\Http\Controllers\TransactionsController::class, 'index']) -> middleware('auth');
Route::get('/transactions/new', [App\Http\Controllers\TransactionsController::class, 'new']) -> middleware('auth');
Route::post('/transactions/add', [App\Http\Controllers\TransactionsController::class, 'add']) -> middleware('auth');
Route::get('/transactions/view/{id}', [App\Http\Controllers\TransactionsController::class, 'view']) -> middleware('auth');
Route::get('/transactions/edit/{id}', [App\Http\Controllers\TransactionsController::class, 'edit']) -> middleware('auth');
Route::post('/transactions/update/{id}', [App\Http\Controllers\TransactionsController::class, 'update']) -> middleware('auth');
Route::delete('/transactions/delete/{id}', [App\Http\Controllers\TransactionsController::class, 'delete']) -> middleware('auth');

