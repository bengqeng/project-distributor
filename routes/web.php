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

        Route::resource('/about', AboutUsController::class);

        Route::resource('/carousel',CarouselController::class)->names([
            'index' => 'admin.carousel',
            'store' => 'admin.carousel.new',
            'destroy' => 'admin.carousel.delete',
            'edit' => 'admin.carousel.edit',
            'update' => 'admin.carousel.update',
            'show' => 'admin.carousel.show',
        ]);

        // Route::get('/product', [ProductController::class, 'index'])->name('admin.webcontent.product');
        Route::resource('/product', ProductController::class);

        Route::resource('/social', SocialMediaController::class);

        Route::get('/article', [ArticleController::class, 'index'])->name('admin.article');
        Route::get('/create-article', [ArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/article', [ArticleController::class, 'store'])->name('admin.article.new');
        Route::get('/detail-article/{slug}', [ArticleController::class, 'show'])->name('admin.article.show');
        Route::get('/article/{slug}/edit', [ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('admin.article.destroy');
        Route::patch('/article/{article}', [ArticleController::class, 'update'])->name('admin.article.update');
    });

    Route::prefix('users')->group(function(){
        Route::get('/all', [UserAllController::class, 'index'])->name('admin.users.all');
        Route::delete('/all/{user}', [UserAllController::class, 'destroy'])->name('admin.users.all.destroy');

        Route::get('/approval', [UserApprovalController::class, 'index'])->name('admin.users.approval');
        Route::post('/approval/{user}/approve', [UserApprovalController::class, 'store'])->name('admin.users.approval.approve');
        Route::delete('/approval/{user}/destroy', [UserApprovalController::class, 'destroy'])->name('admin.users.approval.destroy');

        Route::get('/deleted', [UserDeletedController::class, 'index'])->name('admin.users.deleted');
        Route::delete('/all/{user}', [UserDeletedController::class, 'destroy'])->name('admin.users.deleted.destroy');
    });

    Route::resource('/upload',MasterImageController::class)->names([
        'index' => 'admin.upload',
        'store' => 'admin.upload.new',
    ]);

    Route::get('/graphic', [AdminController::class, 'graphic']);
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
