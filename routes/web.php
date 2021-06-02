<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\setting\AboutUsController;
use App\Http\Controllers\setting\CarouselController;
use App\Http\Controllers\setting\SocialMediaController;
use App\Http\Controllers\setting\ArticleController;
use App\Http\Controllers\setting\ProductController;
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
Route::get('/admin/webcontent', [AdminController::class, 'webcontent']);

Route::get('/admin/webcontent/about', [AboutUsController::class, 'index'])->name('admin.webcontent.about_us');
//Route::resource('/admin/webcontent/carousel',CarouselController::class);

Route::get('/admin/webcontent/carousel', [CarouselController::class, 'index'])->name('admin.webcontent.carousel');
Route::delete('/admin/webcontent/carousel/{carousel}', [CarouselController::class, 'destroy']);

Route::get('/admin/webcontent/product', [ProductController::class, 'index'])->name('admin.webcontent.product');
Route::delete('/admin/webcontent/product/{product}', [ProductController::class, 'destroy']);

Route::get('/admin/webcontent/social', [SocialMediaController::class, 'index'])->name('admin.webcontent.social_media');
Route::delete('/admin/webcontent/social/{social_media}', [ProductController::class, 'destroy']);

Route::get('/admin/webcontent/article', [ArticleController::class, 'index'])->name('admin.webcontent.article');

Route::get('/admin/users/all', [AdminController::class, 'usersAll'])->name('admin.users.all');
Route::get('/admin/users/approval', [AdminController::class, 'userApproval'])->name('admin.users.approval');
Route::get('/admin/users/deleted', [AdminController::class, 'userDeleted'])->name('admin.users.deleted');

Route::get('/admin/upload', [AdminController::class, 'upload']);
Route::get('/admin/graphic', [AdminController::class, 'graphic']);

// member Route ###########################################################################################################
Route::get('/member', [MemberController::class, 'index'])->name('index');
Route::get('/member/profile', [MemberController::class, 'profile']);


// login-register Route ###########################################################################################################
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
