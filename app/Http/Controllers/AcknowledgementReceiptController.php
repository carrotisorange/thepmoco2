<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class AcknowledgementReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id, 'opens', 8);
     */
    public function index(Property $property)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);
        
        $collections = Property::find(Session::get('property'))->acknowledgementreceipts;

        return view('collections.index',[
           'collections'=> $collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function get_latest_ar($property)
    {
        return Property::find($property)->acknowledgementreceipts->max('ar_no')+1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($tenant_uuid, $collection, $property_uuid, $user_id, $ar_no, $mode_of_payment, $batch_no, $cheque_no, $bank, $date_deposited, $created_at)
    {
        return AcknowledgementReceipt::create([
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcknowledgementReceipt  $acknowledgementReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(AcknowledgementReceipt $acknowledgementReceipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcknowledgementReceipt  $acknowledgementReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(AcknowledgementReceipt $acknowledgementReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcknowledgementReceipt  $acknowledgementReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcknowledgementReceipt $acknowledgementReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcknowledgementReceipt  $acknowledgementReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy($collection_batch_no)
    {
        AcknowledgementReceipt::where('collection_batch_no', $collection_batch_no)->delete();
    }
}
