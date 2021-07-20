<?php

namespace App\Mail\notification;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class UsersApprovalNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
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
                ->view('emails.users.approve_notification')
                ->text('emails.users.approve_notification_plain')
                ->subject(env('APP_NAME') . " - Persetujuan Anggota")
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
