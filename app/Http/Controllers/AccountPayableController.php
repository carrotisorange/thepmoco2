<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use Illuminate\Support\Facades\Storage;

class AccountPayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property_uuid, $status=null)
    {
     

        return view('accountpayables.index',[
            'accountpayables' => Property::find(Session::get('property'))->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function download($property_uuid, $id)
    {
        $accountPayable = AccountPayable::find($id);

        return Storage::download(($accountPayable->attachment),'AP_'.$accountPayable->id.'_'.$accountPayable->created_at.'.png');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accountpayables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request_for, $particular_id, $requester_id, $property_uuid, $biller_id, $amount)
    {
        AccountPayable::create([
            'request_for' => $request_for,
            'particular_id' => $particular_id,
            'requester_id' => $requester_id,
            'property_uuid' => $property_uuid,
            'biller_id' => $biller_id,
            'amount' => $amount,
            //'attachment' => $attachment,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountPayable  $accountPayable
     * @return \Illuminate\Http\Response
     */
    public function show(AccountPayable $accountPayable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountPayable  $accountPayable
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountPayable $accountPayable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountPayable  $accountPayable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountPayable $accountPayable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountPayable  $accountPayable
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountPayable $accountPayable)
    {
        //
    }
}
