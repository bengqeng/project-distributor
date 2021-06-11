<?php

namespace App\Providers;

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
                'admin.graphic',
                'admin.admin',
                'admin.uploadimage',
                'admin.users.approval',
                'admin.users.all',
                'admin.users.detail',
                'admin.users.deleted',
                'admin.web_content.about_us',
                'admin.web_content.article',
                'admin.web_content.carousel',
                'admin.web_content.product',
                'admin.web_content.social_media'
            ],
            'App\Http\View\Composers\AdminNotificationComposer'
        );
    }
}
