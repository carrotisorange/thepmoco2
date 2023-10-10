<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Carbon\Carbon;

class AccountPayableController extends Controller
{
    public function getAccountPayables($property_uuid){
        return Property::find($property_uuid)->accountpayables();
    }

    public function index(Property $property, $status=null)
    {
        $featureId = 13;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->store_property_session(Session::get('property_uuid'));

        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, Session::get('property_uuid'));

        return view('properties.accountpayables.index',[
            'accountpayables' => Property::find(Session::get('property_uuid'))->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
            'property' => $property
        ]);
    }

    public function get_accountpayables($property_uuid, $status, $created_at, $request_for, $limitDisplayTo, $search){

        return Property::find($property_uuid)->accountpayables()
        ->when($status, function ($query, $status) {
        $query->where('status', $status);
        })
        ->when(($created_at), function($query, $created_at){
        $query->whereDate('created_at', $created_at );
        })
        ->when($request_for, function ($query, $request_for) {
        $query->where('request_for', $request_for);
        })
        ->when($search, function ($query, $search) {
        $query->where('batch_no','like', '%'.$search.'%');
        })
        ->orderBy('created_at', 'desc')->paginate(10);
    }

    public function export($property_uuid, $status=null, $created_at=null, $request_for=null, $limitDisplayTo=null){

        $data = [
          'accountpayables' => Property::find($property_uuid)->accountpayables
        ];

          $pdf = \PDF::loadView('properties.accountpayables.export', $data);

        $pdf->output();

          $canvas = $pdf->getDomPDF()->getCanvas();

          $height = $canvas->get_height();
          $width = $canvas->get_width();

          $canvas->set_opacity(.2,"Multiply");

          $canvas->set_opacity(.2);

          $canvas->page_text($width/5, $height/2, "", null, 55,
          array(0,0,0),2,2,-30);

          return $pdf->stream(Property::find($property_uuid)->property.'-'.Carbon::now()->format('M d, Y').'accountpayables.pdf');

    }

    public function get_statuses()
    {
        return AccountPayable::where('property_uuid', Session::get('property_uuid'))
        ->groupBy('status')
        ->get();
    }

    public function get_dates(){
        return AccountPayable::where('property_uuid', Session::get('property_uuid'))
        ->select('created_at')
        ->groupBy('created_at')
        ->get();
    }

    public function get_types(){
        return AccountPayable::where('property_uuid', Session::get('property_uuid'))
        ->select('request_for')
        ->groupBy('request_for')
        ->get();
    }

    public function show(Property $property, AccountPayable $accountPayable){
        return view('properties.accountpayables.show',[
            'accountpayable' => $accountPayable,
            'particulars' => AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get()
        ]);
    }

    public function download(Property $property, AccountPayable $accountPayable){
       $data = [
        'accountpayable' => $accountPayable,
        'particulars' => AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get()
       ];

       $pdf = \PDF::loadView('properties.accountpayables.download', $data);

       $pdf->output();

       $canvas = $pdf->getDomPDF()->getCanvas();

       $height = $canvas->get_height();
       $width = $canvas->get_width();

       $canvas->set_opacity(.2,"Multiply");

       $canvas->set_opacity(.2);

       $canvas->page_text($width/5, $height/2,"", null, 55, array(0,0,0),2,2,-30);

       return $pdf->stream($accountPayable->property->property.'-'.Carbon::now()->format('M d, Y').'accountpayables.pdf');
    }

    public function update($id, $request_for, $created_at, $due_date, $requester_id, $amount, $vendor, $bank, $bank_name, $bank_account, $delivery_at, $approver_id, $approver2_id, $status, $selected_quotation){

        AccountPayable::where('id', $id)
        ->update([
            'request_for' => $request_for,
            'created_at' => $created_at,
            'due_date' => $due_date,
            'requester_id' => $requester_id,
            'amount' => $amount,
            'vendor' => $vendor,
            'bank' => $bank,
            'bank_name' => $bank_name,
            'bank_account' => $bank_account,
            'delivery_at' => $delivery_at,
            'approver_id' => $approver_id,
            'approver2_id' => $approver2_id,
            'status' => $status,
            'selected_quotation' => $selected_quotation
        ]);
    }

}
