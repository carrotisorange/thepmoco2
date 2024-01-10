<?php

namespace App\Http\Controllers\Subfeatures;

use App\Http\Controllers\Controller;
use App\Models\AcknowledgementReceipt;
use Illuminate\Support\Facades\Session;

class AcknowledgementReceiptController extends Controller
{
    public function store($type,$uuid,$collection, $ar_no, $mode_of_payment, $batch_no, $cheque_no, $bank, $date_deposited, $created_at)
    {
        $ar_id = AcknowledgementReceipt::insertGetId([
            $type.'_uuid' => $uuid,
            'amount' => $collection,
            'property_uuid' => Session::get('property_uuid'),
            'user_id' => auth()->user()->id,
            'ar_no' => $ar_no,
            'mode_of_payment' => $mode_of_payment,
            'collection_batch_no' => $batch_no,
            'cheque_no' => $cheque_no,
            'bank' => $bank,
            'date_deposited' => $date_deposited,
            'created_at' => $created_at,
        ]);

        return $ar_id;

    }

}
