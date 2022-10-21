<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Models\Property;
use Session;

class AcknowledgementReceiptController extends Controller
{
    public function index(Property $property)
    {
        $this->authorize('is_account_receivable_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);
        
        $collections = Property::find(Session::get('property'))->acknowledgementreceipts;

        return view('collections.index',[
           'collections'=> $collections,
        ]);
    }

    public function get_latest_ar($property)
    {
        return Property::find($property)->acknowledgementreceipts->max('ar_no')+1;
    }

    public function store($tenant_uuid, $collection, $property_uuid, $user_id, $ar_no, $mode_of_payment, $batch_no, $cheque_no, $bank, $date_deposited, $created_at, $attachment)
    {
        $ar_id = AcknowledgementReceipt::insertGetId([
            'tenant_uuid' => $tenant_uuid,
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
     
    }

    public function destroy($collection_batch_no)
    {
        AcknowledgementReceipt::where('collection_batch_no', $collection_batch_no)->delete();
    }
}
