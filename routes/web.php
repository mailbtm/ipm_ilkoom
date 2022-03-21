<?php

use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('can:update,user');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('can:update,user');
Route::delete('/users/{user}', [UserController::class, 'delete'])->middleware('can:delete,user');


