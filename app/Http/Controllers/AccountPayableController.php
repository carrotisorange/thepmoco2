<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Str;

class AccountPayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property_uuid, $status=null)
    {
        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',17);

        return view('accountpayables.index',[
            'accountpayables' => Property::find(Session::get('property'))->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function get_property_expenses($property_uuid, $daily, $monthly)
    {
        return Property::find($property_uuid)->accountpayables()
        ->when($daily, function ($query) use ($daily) {
        $query->whereDate('created_at', $daily);
        })
        ->when($monthly, function ($query) use ($monthly) {
        $query->whereMonth('created_at', $monthly);
        })

        ->get();
    }

    public function create_step_1($property_uuid){
        return view('accountpayables.create.step-1');
    }

    public function create_step_2($property_uuid, $accountpayable_id){
    
        return view('accountpayables.create.step-2', [
           'accountpayable_id' => $accountpayable_id
        ]);
    }

    public function create_step_3($property_uuid){
        return view('accountpayables.create.step-3');
    }

    public function create_step_4($property_uuid){
        return view('accountpayables.create.step-4');
    }

    public function create_step_5($property_uuid){
        return view('accountpayables.create.step-5');
    }

    public function create_step_6($property_uuid){
        return view('accountpayables.create.step-6');
    }



    public function download($property_uuid, $id)
    {
        $accountPayable = AccountPayable::find($id);

        return Storage::download(($accountPayable->attachment),'AP_'.$accountPayable->id.'_'.$accountPayable->created_at.'.png');
    }

    public function approve($property_uuid, $id)
    {
        AccountPayable::where('id', $id)
        ->update([
            'approver_id' => auth()->user()->id,
            'approved_at' => Carbon::now(),
            'status' => 'approved'
        ]);

        return back()->with('succes', 'Request is successfully approved.');
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
    // public function store($request_for, $particular_id, $requester_id, $property_uuid, $biller_id, $amount)
    // {
    //     AccountPayable::create([
    //         'request_for' => $request_for,
    //         'particular_id' => $particular_id,
    //         'requester_id' => $requester_id,
    //         'property_uuid' => $property_uuid,
    //         'biller_id' => $biller_id,
    //         'amount' => $amount,
    //         //'attachment' => $attachment,
    //     ]);

    // }

    public function store($step, $property_uuid, $request_for, $created_at, $requester_id, $particular){
           
        
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
