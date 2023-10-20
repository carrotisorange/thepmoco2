<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcknowledgementReceipt;

class AcknowledgementReceiptController extends Controller
{
    public function store($tenant_uuid,$owner_uuid,$collection, $property_uuid, $user_id, $ar_no, $mode_of_payment, $batch_no, $cheque_no, $bank, $date_deposited, $created_at, $attachment, $proof_of_payment)
    {
        $ar_id = AcknowledgementReceipt::insertGetId([
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid,
            'amount' => $collection,
            'property_uuid' => $property_uuid,
            'user_id' => $user_id,
            'ar_no' => $ar_no,
            'mode_of_payment' => $mode_of_payment,
            'collection_batch_no' => $batch_no,
            'cheque_no' => $cheque_no,
            'bank' => $bank,
            'date_deposited' => $date_deposited,
            'created_at' => $created_at,
        ]);

        if(!$attachment == null)
        {
               AcknowledgementReceipt::where('id', $ar_id)
                ->update([
                'attachment' => $attachment->store('attachments')
               ]);
        }

        if(!$proof_of_payment == null)
        {
            AcknowledgementReceipt::where('id', $ar_id)
                ->update([
                'proof_of_payment' => $proof_of_payment->store('proof_of_payments')
            ]);
        }

        return $ar_id;

    }

}
