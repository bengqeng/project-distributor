<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('index.admin');
Route::get('/admin/webcontent', [AdminController::class, 'webcontent']);

Route::get('/admin/users/all', [AdminController::class, 'usersAll'])->name('admin.users.all');
Route::get('/admin/users/approval', [AdminController::class, 'userApproval'])->name('admin.users.aproval');
Route::get('/admin/users/deleted', [AdminController::class, 'userDeleted'])->name('admin.users.deleted');

Route::get('/admin/upload', [AdminController::class, 'upload']);
Route::get('/admin/graphic', [AdminController::class, 'graphic']);

// member Route ###########################################################################################################
Route::get('/member', [MemberController::class, 'index'])->name('index');
Route::get('/member/profile', [MemberController::class, 'profile']);


// login-register Route ###########################################################################################################
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
