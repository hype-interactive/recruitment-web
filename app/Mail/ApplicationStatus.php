<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $status;
    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $status, $application)
    {
        $this->user = $user;
        $this->status = $status;
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Application Status Alert')
                    ->markdown('emails.application-status');
    }
}
