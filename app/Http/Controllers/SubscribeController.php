<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
         request()->validate([
         'email' => 'required|email'
         ]);

         $mailchimp = new \MailchimpMarketing\ApiClient();

         $mailchimp->setConfig([
         'apiKey' => config('services.mailchimp.key'),
         'server' => 'us14'
         ]);

         $response = $mailchimp->lists->addListMember('db2643a470',[
         'email_address' => request('email'),
         'status' => 'subscribed'
         ]);

         return redirect('/#Subscribes')->with('success', 'You are now signed up for our newsletter.');
    }
}
