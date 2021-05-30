<?php

use App\Http\Controllers\AdminController;
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
Route::get('/admin/profile', [AdminController::class, 'profile']);

Route::get('/admin/webcontent/corousel', [AdminController::class, 'corousel'])->name('admin.webcontent.corousel');
Route::get('/admin/webcontent/product', [AdminController::class, 'product'])->name('admin.webcontent.product');
Route::get('/admin/webcontent/about', [AdminController::class, 'about'])->name('admin.webcontent.about');
Route::get('/admin/webcontent/social', [AdminController::class, 'social'])->name('admin.webcontent.social');
Route::get('/admin/webcontent/article', [AdminController::class, 'article'])->name('admin.webcontent.article');

Route::get('/admin/users/all', [AdminController::class, 'usersAll'])->name('admin.users.all');
Route::get('/admin/users/approval', [AdminController::class, 'userApproval'])->name('admin.users.approval');
Route::get('/admin/users/deleted', [AdminController::class, 'userDeleted'])->name('admin.users.deleted');

Route::get('/admin/upload', [AdminController::class, 'upload']);
Route::get('/admin/graphic', [AdminController::class, 'graphic']);

// member Route ###########################################################################################################
Route::get('/member', [MemberController::class, 'index'])->name('index');
Route::get('/member/profile', [MemberController::class, 'profile']);
