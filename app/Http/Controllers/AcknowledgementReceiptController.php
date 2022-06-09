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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
