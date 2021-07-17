<?php

namespace App\Mail\notification;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class UsersRejectedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::where('uuid', $this->uuid)->first();

        $email = $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
                ->to($user->email)
                ->view('emails.users.rejected_notification')
                ->text('emails.users.rejected_notification_plain')
                ->subject(env('APP_NAME') . " User telah di tolak")
                ->with([
                    'user'       => $user
                ]);

            if (App::environment('local')) {
                $email = $this->to('bengqeng.dev@gmail.com');
                $email = $this->cc(env('MAIL_INTERCEPT_ADDRESS'));
            }

        return $email;
    }
}
