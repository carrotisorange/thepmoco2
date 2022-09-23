<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Tenant;

class PaymentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property_uuid, $status)
    {
        return view('payment_requests.index',[
            'requests' => $this->get_property_payment_requests($property_uuid, $status)->get()
        ]);
    }

    public function get_property_payment_requests($property_uuid, $status)
    {
        return PaymentRequest::join('tenants', 'payment_requests.tenant_uuid', 'tenants.uuid')
        ->where('tenants.property_uuid', $property_uuid)
        ->where('status', $status)
        ->orderBy('payment_requests.created_at', 'desc');
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
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function show($property_uuid, Tenant $tenant, PaymentRequest $paymentRequest)
    {
        return view('payment_requests.show',[
            'paymentRequest' => $paymentRequest,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentRequest $paymentRequest)
    {
        //
    }

    public function download()
    {
         return Storage::download(($attachment), 'AR_'.$concern->reference_no.'_'.$concern->tenant->tenant.'.png');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentRequest $paymentRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentRequest $paymentRequest)
    {
        //
    }
}
