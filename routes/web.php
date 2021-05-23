<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');

Route::get('/admin', [AdminController::class, 'index'])->name('index.admin');
Route::get('/admin/webcontent', [AdminController::class, 'webcontent']);

Route::get('/admin/users/all', [AdminController::class, 'usersAll'])->name('admin.users.all');
Route::get('/admin/users/approval', [AdminController::class, 'userApproval'])->name('admin.users.aproval');
Route::get('/admin/users/deleted', [AdminController::class, 'userDeleted'])->name('admin.users.deleted');

Route::get('/admin/upload', [AdminController::class, 'upload']);
Route::get('/admin/graphic', [AdminController::class, 'graphic']);
