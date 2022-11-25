<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $jobPost;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $jobPost)
    {
        $this->user = $user;
        $this->jobPost = $jobPost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Application Submission')
                    ->markdown('emails.application-submission');
    }
}
