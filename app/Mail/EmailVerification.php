<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

protected $user;
public $email_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email_token)
    {
        $this->user = $user;
        $this->email_token =$email_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->view('emails.emailVerification')->with([
                'email_token' => $this->user->email_token,
                ]);


        //return $this->view('view.name');
    }
}
