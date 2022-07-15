<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;


class CheckoutController extends Controller
{
    private $token = 'xnd_development_s3XST6NK13S4A3gYjgNoaJMvT5X5bSBSAiHJhzne02DxonZ2v18tOjt3VmJ';

    public function create()
    {
        return view('checkout.create');
    }

    public function submit()
    {
        Xendit::setApiKey($this->token);

        $params = [
            'external_id' => 'demo_147580196270',
            'payer_email' => 'sample_email@xendit.co',
            'description' => 'Trip to Bali',
            'amount' => 32000,  
            'interval' => 'MONTH',
            'interval_count' => 1
        ];

        $createInvoice = \Xendit\Invoice::create($params);
        print_r($createInvoice);

        $id = $createInvoice["id"];

        $getInvoice = \Xendit\Invoice::retrieve($id);
        print_r($getInvoice);
    }
}
