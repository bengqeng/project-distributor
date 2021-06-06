<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\landingpage\AboutUsController as LandingpageAboutUsController;
use App\Http\Controllers\landingpage\GalleryController;
use App\Http\Controllers\landingpage\LandingPageController;
use App\Http\Controllers\landingpage\NewsController;
use App\Http\Controllers\landingpage\ProductController as LandingpageProductController;
use App\Http\Controllers\setting\AboutUsController;
use App\Http\Controllers\setting\CarouselController;
use App\Http\Controllers\setting\SocialMediaController;
use App\Http\Controllers\setting\ArticleController;
use App\Http\Controllers\setting\MasterImageController;
use App\Http\Controllers\setting\ProductController;
use App\Http\Controllers\setting\UserAllController;
use App\Http\Controllers\setting\UserApprovalController;
use App\Http\Controllers\setting\UserDeletedController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/verify-login', [AuthController::class, 'verifyLogin'])->name('auth.submit_login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/submit-register', [AuthController::class, 'verifyRegister'])->name('auth.submit_register');

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('/about', [LandingpageAboutUsController::class, 'index'])->name('landingpage.about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('landingpage.gallery');
Route::get('/product/category', [LandingpageProductController::class, 'index'])->name('landingpage.product.category');
Route::get('/news/all', [NewsController::class, 'index'])->name('landingpage.news.all');
Route::get('/news/{slug}/detail', [NewsController::class, 'show'])->name('landingpage.news.detail');


Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('index.admin');
  Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::get('/admin/webcontent', [AdminController::class, 'webcontent']);

  Route::get('/admin/webcontent/about', [AboutUsController::class, 'index'])->name('admin.webcontent.about_us');

  Route::get('/admin/webcontent/carousel', [CarouselController::class, 'index'])->name('admin.webcontent.carousel');
  Route::delete('/admin/webcontent/carousel/{carousel}', [CarouselController::class, 'destroy']);

  Route::get('/admin/webcontent/product', [ProductController::class, 'index'])->name('admin.webcontent.product');
  Route::delete('/admin/webcontent/product/{product}', [ProductController::class, 'destroy']);

  Route::get('/admin/webcontent/social', [SocialMediaController::class, 'index'])->name('admin.webcontent.social_media');
  Route::delete('/admin/webcontent/social/{social_media}', [ProductController::class, 'destroy']);

  Route::get('/admin/webcontent/article', [ArticleController::class, 'index'])->name('admin.webcontent.article');

  Route::get('/admin/users/all', [UserAllController::class, 'index'])->name('admin.users.all');
  Route::delete('/admin/users/all/{user}', [UserAllController::class, 'destroy'])->name('admin.users.all.destroy');

  Route::get('/admin/users/approval', [UserApprovalController::class, 'index'])->name('admin.users.approval');
  Route::delete('/admin/users/all/{user}', [UserApprovalController::class, 'destroy'])->name('admin.users.approval.destroy');

  Route::get('/admin/users/deleted', [UserDeletedController::class, 'index'])->name('admin.users.deleted');
  Route::delete('/admin/users/all/{user}', [UserDeletedController::class, 'destroy'])->name('admin.users.deleted.destroy');

  Route::get('/admin/upload', [MasterImageController::class, 'index'])->name('masterimage.upload');
  Route::delete('/admin/upload/{masterimage}', [MasterImageController::class, 'destroy']);

  Route::get('/admin/graphic', [AdminController::class, 'graphic']);
});

Route::get('/member', [MemberController::class, 'index'])->name('index');
Route::get('/member/profile', [MemberController::class, 'profile']);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//open page
Route::get('/provinsi/{id}/kabupaten', [KabupatenController::class, 'kabupatenByProvinsi'])->name('kabupaten_by_provinsi');
Route::get('/kabupaten/{id}/kecamatan', [KecamatanController::class, 'kecamatanByKabupaten'])->name('Kecamatan_by_kabupaten');
//END open page

Route::fallback(function () {
    return view('errors.my_global_error');
});
