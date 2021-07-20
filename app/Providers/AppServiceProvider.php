<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer(
            [
                'admin.index',
                'admin.profile',
                'admin.edit-profile',
                'admin.graphic',
                'admin.admin',
                'admin.uploadimage',
                'admin.users.by_region',
                'admin.users.approval',
                'admin.users.active',
                'admin.users.detail',
                'admin.users.rejected',
                'admin.users.banned',
                'admin.web_content.about_us',
                'admin.web_content.edit-about',
                'admin.web_content.article',
                'admin.web_content.carousel',
                'admin.web_content.social_media',
                'admin.web_content.detail-article',
                'admin.web_content.create-article',
                'admin.web_content.edit-article',
                'admin.product.product_index',
                'admin.product.product_category_index',
                'admin.product.create-product',
                'admin.product.edit-product',
                'admin.reports.reports'
            ],
            'App\Http\View\Composers\AdminNotificationComposer'
        );

        View::composer(
            [
                'landingpage.index',
                'landingpage.about',
                'landingpage.gallery',
                'landingpage.news.all',
                'landingpage.news.detail',
                'landingpage.product.category',
                'landingpage.product.detail',
                'landingpage.product.product',
            ],
            'App\Http\View\Composers\LandingPageSocialMediaComposer'
        );
    }
}
