<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
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


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index.admin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/upload', [MasterImageController::class, 'index'])->name('masterimage.upload');
    Route::delete('/upload/{masterimage}', [MasterImageController::class, 'destroy']);
    Route::get('/graphic', [AdminController::class, 'graphic']);

    Route::prefix('webcontent')->group(function(){
        Route::get('', [AdminController::class, 'webcontent']);
        Route::get('/about', [AboutUsController::class, 'index'])->name('admin.webcontent.about_us');

        Route::get('/carousel', [CarouselController::class, 'index'])->name('admin.webcontent.carousel');
        Route::delete('/carousel/{carousel}', [CarouselController::class, 'destroy']);

        Route::get('/product', [ProductController::class, 'index'])->name('admin.webcontent.product');
        Route::delete('/product/{product}', [ProductController::class, 'destroy']);

        Route::get('/social', [SocialMediaController::class, 'index'])->name('admin.webcontent.social_media');
        Route::delete('/social/{social_media}', [ProductController::class, 'destroy']);

        Route::get('/article', [ArticleController::class, 'index'])->name('admin.webcontent.article');
    });

    Route::prefix('users')->group(function(){
        Route::get('/all', [UserAllController::class, 'index'])->name('admin.users.all');
        Route::delete('/all/{user}', [UserAllController::class, 'destroy'])->name('admin.users.all.destroy');

        Route::get('/approval', [UserApprovalController::class, 'index'])->name('admin.users.approval');
        Route::delete('/all/{user}', [UserApprovalController::class, 'destroy'])->name('admin.users.approval.destroy');

        Route::get('/deleted', [UserDeletedController::class, 'index'])->name('admin.users.deleted');
        Route::delete('/all/{user}', [UserDeletedController::class, 'destroy'])->name('admin.users.deleted.destroy');
    });
});

Route::prefix('member')->group(function(){
    Route::get('', [MemberController::class, 'index'])->name('index');
    Route::get('/profile', [MemberController::class, 'profile']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//open page
Route::get('/provinsi/{id}/kabupaten', [KabupatenController::class, 'kabupatenByProvinsi'])->name('kabupaten_by_provinsi');
Route::get('/kabupaten/{id}/kecamatan', [KecamatanController::class, 'kecamatanByKabupaten'])->name('Kecamatan_by_kabupaten');
Route::get('/kecamatan/{id}/kelurahan', [KelurahanController::class, 'kelurahanByKecamatan'])->name('kelurahan_by_kabuptan');
//END open page

Route::fallback(function () {
    return view('errors.my_global_error');
});
