<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;

class AccountPayableController extends Controller
{
  
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

    public function store(Property $property, $request_for, $batch_no){

        $this->authorize('is_account_payable_create_allowed');

        $generated_batch_no = auth()->user()->id.'-'.sprintf('%08d', AccountPayable::where('property_uuid',$property->uuid)->where('status', '!=', 'unknown')->count()).'-'.$batch_no;

        $account_payable = AccountPayable::updateOrCreate(
            [
                'batch_no' => $generated_batch_no,
                'property_uuid' => $property->uuid,
                'request_for' => $request_for,
                'requester_id' => auth()->user()->id,
                'status' => 'unknown'
            ]
            ,
            [
            'property_uuid' => $property->uuid,
            'requester_id' => auth()->user()->id,
            'batch_no' => $generated_batch_no,
            'request_for' => $request_for,
            'created_at' => Carbon::now(),
            'status' => 'unknown'
        ]);

        return redirect('/property/'.$property->uuid.'/accountpayable/'.$account_payable->id.'/step-1')->with('success', 'Success!');

    }

    public function download_step_1(Property $property, AccountPayable $accountpayable){

        $particulars = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get();
         
        $data = [
            'accountpayable' => $accountpayable,
            'particulars' => $particulars
         ];

         $pdf = \PDF::loadView('accountpayables.pdf.step1', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($property->property.'-'.Carbon::now()->format('M d, Y').'accountpayables.pdf');
    }

      public function create_step_1(Property $property, AccountPayable $accountpayable){

        return view('accountpayables.create.step-1', [
            'property' => $property,
            'accountpayable' => $accountpayable
        ]);
    }

    public function create_step_2(Property $property, AccountPayable $accountpayable){

    return view('accountpayables.create.step-2', [
    'property' => $property,
    'accountpayable' => $accountpayable
    ]);
    }

    public function create_step_3(Property $property, AccountPayable $accountpayable){


        return view('accountpayables.create.step-3', [
            'property' => $property,
            'accountpayable' => $accountpayable
        ]);
    }

    public function create_step_4($property_uuid, $accountpayable_id){
    
        return view('accountpayables.create.step-4', [
           'accountpayable_id' => $accountpayable_id
        ]);
    }

    public function create_step_5($property_uuid, $accountpayable_id){
        
        // $this->authorize('accountpayable');

        return view('accountpayables.create.step-5', [
           'accountpayable_id' => $accountpayable_id
        ]);
    }

    public function create_step_6(Property $property, AccountPayable $accountpayable){

        $this->authorize('accountpayable');

        return view('accountpayables.create.step-6', [
            'property' => $property,
           'accountpayable' => $accountpayable,
        ]);
    }

    public function create_request_status($property_uuid){
        return view('accountpayables.create.request-status');
    }

    public function create_request_comment($property_uuid){
        return view('accountpayables.create.request-comment');
    }

    //pdf

    public function create_step1(Property $property, AccountPayable $accountPayable){
        $html = view('accountpayables.pdf.step1',[
            'property' => $property, 
            'accountPayable' => $accountPayable
        ])->render();

        Browsershot::html('<h1>Hello world!!</h1>')->save('example.pdf');

        // Browsershot::html($html)->save(storage_path('app/'.$accountPayable->id.'.pdf'));

        return "Done";
    }

    public function create_step2($property_uuid){
        return view('accountpayables.pdf.step2');
    }

    public function create_step3($property_uuid){
        return view('accountpayables.pdf.step3');
    }

    public function create_step4($property_uuid){
        return view('accountpayables.pdf.step4');
    }

    public function create_step5($property_uuid){
        return view('accountpayables.pdf.step5');
    }

    public function create_step6($property_uuid){
        return view('accountpayables.pdf.step6');
    }


    public function download($property_uuid, $id)
    {
        $accountPayable = AccountPayable::find($id);

        return Storage::stream(($accountPayable->attachment),'AP_'.$accountPayable->id.'_'.$accountPayable->created_at.'.png');
    }

    public function approve($property_uuid, $id)
    {
        AccountPayable::where('id', $id)
        ->update([
            'approver_id' => auth()->user()->id,
            'approved_at' => Carbon::now(),
            'status' => 'approved'
        ]);

        return back()->with('success', 'Success!');
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
    public function store_step_1($property_uuid, $request_for, $created_at, $due_date, $requester_id, $batch_no, $amount){

    $this->authorize('is_account_payable_create_allowed');
           
    return AccountPayable::updateOrCreate(
        [
            'batch_no' => $batch_no,
            'property_uuid' => $property_uuid,
            'request_for' => $request_for
        ]
        ,[
            'property_uuid' => $property_uuid,
            'request_for' => $request_for,
            'created_at' => $created_at,
            'due_date' => $due_date,
            'requester_id' => $requester_id,
            'batch_no' => $batch_no,
            'amount' => $amount,
         ])->id; 
    }

    public function store_step_3($accountpayable_id, $status, $comment, $vendor){
        AccountPayable::where('id', $accountpayable_id)
        ->update([
        'status' => $status,
        'approver_id' => auth()->user()->id,
        'comment' => $comment,
        'vendor' => $vendor
        ]);
    }

    public function store_step_5($accountpayable_id, $status, $comment){
        AccountPayable::where('id', $accountpayable_id)
        ->update([
        'status' => $status,
        'approver2_id' => auth()->user()->id,
        'comment2' => $comment,
        'is_approved' => 1
        ]);
    }

     public function show(Property $property, AccountPayable $accountPayable){
        return view('properties.accountpayables.show',[
            'property' => $property,
            'accountpayable' => $accountPayable,
        ]);
     }
}
