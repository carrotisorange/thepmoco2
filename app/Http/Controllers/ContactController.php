<?php

namespace App\Http\Controllers;

use App\Mail\ReceiveContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'subject' => 'required', 
            'message' => 'required'
        ]);

        $details =[
            'name' => request('name'),
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),
          ];

          Mail::to('thepropertymanagernoreply@gmail.com')->send(new ReceiveContactMail($details));

          return redirect('/#contact')->with('success', 'Success!');
    }
}
