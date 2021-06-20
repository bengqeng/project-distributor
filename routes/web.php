<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\member\MemberController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\landingpage\AboutUsController as LandingpageAboutUsController;
use App\Http\Controllers\landingpage\GalleryController;
use App\Http\Controllers\landingpage\LandingPageController;
use App\Http\Controllers\landingpage\NewsController;
use App\Http\Controllers\landingpage\ProductController as LandingpageProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\setting\AboutUsController;
use App\Http\Controllers\setting\CarouselController;
use App\Http\Controllers\setting\SocialMediaController;
use App\Http\Controllers\setting\ArticleController;
use App\Http\Controllers\setting\GraphicController;
use App\Http\Controllers\setting\MasterImageController;
use App\Http\Controllers\setting\ProductController;
use App\Http\Controllers\setting\ReportController;
use App\Http\Controllers\setting\UserActiveController;
use App\Http\Controllers\setting\UserApprovalController;
use App\Http\Controllers\setting\UserRejectedController;
use App\Http\Controllers\UserBannedController;
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
Route::middleware(['alreadyLogin'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/verify-login', [AuthController::class, 'verifyLogin'])->name('auth.submit_login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/submit-register', [AuthController::class, 'verifyRegister'])->name('auth.submit_register');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('/about', [LandingpageAboutUsController::class, 'index'])->name('landingpage.about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('landingpage.gallery');

Route::get('/product', [LandingpageProductController::class, 'index'])->name('landingpage.product.category');
Route::get('/product/{slug}/detail', [LandingpageProductController::class, 'show'])->name('landingpage.product.detail');

Route::get('/news', [NewsController::class, 'index'])->name('landingpage.news.all');
Route::get('/news/{slug}/detail', [NewsController::class, 'show'])->name('landingpage.news.detail');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index.admin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('admin.edit-profile');
    Route::get('/upload', [MasterImageController::class, 'index'])->name('masterimage.upload');
    Route::get('/log-activity', [AdminController::class, 'logActivityUser'])->name('admin.log_activity_user');
    Route::delete('/upload/{masterimage}', [MasterImageController::class, 'destroy']);

    Route::prefix('graphic')->group(function(){
        Route::get('', [GraphicController::class, 'index'])->name('admin.graphic.index');
        Route::get('/bar-users-by-month', [GraphicController::class, 'barUsers'])->name('admin.graphic.bar_users');
    });

    Route::prefix('webcontent')->group(function(){
        Route::get('', [AdminController::class, 'webcontent']);

        Route::resource('/about', AboutUsController::class);

        Route::resource('/carousel',CarouselController::class)->names([
            'index'     => 'admin.carousel',
            'store'     => 'admin.carousel.new',
            'destroy'   => 'admin.carousel.delete',
            'edit'      => 'admin.carousel.edit',
            'update'    => 'admin.carousel.update',
            'show'      => 'admin.carousel.show',
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
        Route::get('/aktif', [UserActiveController::class, 'index'])->name('admin.users.aktif');
        Route::get('/aktif/{user}/detail', [UserActiveController::class, 'show'])->name('admin.users.aktif.detail');
        Route::post('/aktif/{user}/ban', [UserActiveController::class, 'banActiveUser'])->name('admin.users.aktif.ban');
        Route::post('/aktif/reset-password', [UserActiveController::class, 'resetPassword'])->name('admin.users.aktif.reset_password');
        Route::delete('/aktif/{user}/destroy', [UserActiveController::class, 'destroy'])->name('admin.users.aktif.destroy');

        Route::get('/approval', [UserApprovalController::class, 'index'])->name('admin.users.approval');
        Route::get('/approval/{user}/detail', [UserApprovalController::class, 'show'])->name('admin.users.approval.detail');
        Route::post('/approval/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approval.approve');
        Route::post('/approval/reject', [UserApprovalController::class, 'reject'])->name('admin.users.approval.reject');
        Route::delete('/approval/{user}/destroy', [UserApprovalController::class, 'destroy'])->name('admin.users.approval.destroy');

        Route::get('/rejected', [UserRejectedController::class, 'index'])->name('admin.users.rejected');
        Route::get('/rejected/{user}/detail', [UserRejectedController::class, 'show'])->name('admin.users.rejected.detail');
        Route::delete('/rejected/{user}', [UserRejectedController::class, 'destroy'])->name('admin.users.rejected.destroy');

        Route::get('/banned', [UserBannedController::class, 'index'])->name('admin.users.banned');
        Route::post('/banned/{user}/open-ban', [UserBannedController::class, 'openBanned'])->name('admin.users.open_banned');
    });
    Route::resource('/profile', ProfileController::class);
    Route::resource('/upload', MasterImageController::class)->names([
        'index' => 'admin.upload',
        'store' => 'admin.upload.new',
        'destroy' => 'admin.upload.delete',
    ]);

    Route::get('/report-show', [ReportController::class, 'index'])->name('admin.report.index');
});

Route::middleware(['auth', 'member'])->prefix('member')->group(function(){
    Route::get('', [MemberController::class, 'index'])->name('member.index');
    Route::get('/{uuid}/profile', [MemberController::class, 'show'])->name('member.show');
    Route::post('/{uuid}/save-edit-profile', [MemberController::class, 'update'])->name('member.update');
    Route::get('{uuid}/change-password', [MemberController::class, 'showeEditPassword'])->name('member.edit_password');
    Route::post('{uuid}/save-change-password', [MemberController::class, 'storeeEditPassword'])->name('member.save.edit_password');
    Route::get('/{uuid}/nearby-member', [MemberController::class, 'nearByMember'])->name('member.near_by_member');
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
