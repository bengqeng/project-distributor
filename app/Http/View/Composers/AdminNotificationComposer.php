<?php

namespace App\Http\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class AdminNotificationComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('notification', $this->compileNotification());
    }

    private function compileNotification()
    {
        // only pending registration
        // Custom Here If You want to add another notification
        $data = [
            'new_register'          => User::NewRegister()->count(),
            'total_notification'    => 0
        ];

        $data['total_notification'] = $data['new_register'];

        return $data;
    }
}
