<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance
     */
    public function __construct() {}

    /**
     * Build the email
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.email.register-email')
                    ->subject('Welcome to ' . env('APP_NAME') . '!')
                    ->from(env('MAIL_FROM'), env('APP_NAME'));
    }

}
