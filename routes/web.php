<?php

use App\Http\Controllers\AdminController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('index_admin');
Route::get('/admin/webcontent', [AdminController::class, 'webcontent']);
Route::get('/admin/users/', [AdminController::class, 'users']);
Route::get('/admin/users/approval', [AdminController::class, 'approval']);
Route::get('/admin/users/deleted', [AdminController::class, 'deleted']);
Route::get('/admin/upload', [AdminController::class, 'upload']);
Route::get('/admin/graphic', [AdminController::class, 'graphic']);
