<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Session;
use Carbon\Carbon;

class SendBillToOwner extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
          return $this->subject(Session::get('property_name').' - Statements of Account as of '.Carbon::parse(Carbon::now())->format('M d, Y'))
           ->from(auth()->user()->email)
          ->markdown('emails.sendbilltoowner', [
          ]);
    }
}
