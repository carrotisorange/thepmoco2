<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Session;

class WelcomeMailToTenant extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->subject(Session::get('property_name'))
                      ->from(auth()->user()->email)
                      ->markdown('emails.welcomemailtotenant', [
                            'url' => 'https://www.thepropertymanager.online/login',
          ]);
    }
}
