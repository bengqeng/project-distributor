<?php

namespace App\Http\View\Composers;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\View\View;

class LandingPageSocialMediaComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('socialMedia', $this->compileNotification());
    }

    private function compileNotification()
    {
        // only pending registration
        // Custom Here If You want to add another notification
        return SocialMedia::select('media_type', 'url')->footer()->get();
    }
}
