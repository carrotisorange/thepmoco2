<?php

namespace App\Http\Controllers;

use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;
use Session;
use App\Models\AccountPayableLiquidation;

class RequestForPurchaseController extends Controller
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

        // $this->authorize('create_rfp'); 

        $generated_batch_no = auth()->user()->id.'-'.sprintf('%08d', AccountPayable::where('property_uuid',$property->uuid)->where('status', '!=', 'pending')->count()).'-'.$batch_no;

        $account_payable = AccountPayable::updateOrCreate(
            [
                'batch_no' => $generated_batch_no,
                'property_uuid' => $property->uuid,
                'request_for' => $request_for,
                'requester_id' => auth()->user()->id,
                'status' => 'pending'
            ]
            ,
            [
                'property_uuid' => $property->uuid,
                'requester_id' => auth()->user()->id,
                'batch_no' => $generated_batch_no,
                'request_for' => $request_for,
                'created_at' => Carbon::now(),
                'status' => 'pending'
        ]);

        return redirect('/property/'.$property->uuid.'/accountpayable/'.$account_payable->id.'/step-1')->with('success', 'Changes Saved!');

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

         $canvas->page_text($width/5, $height/2, "", null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($property->property.'-'.Carbon::now()->format('M d, Y').'accountpayables.pdf');
    }

      public function create_step_1(Property $property, AccountPayable $accountpayable){
        //accessible only to the requestor
        if($accountpayable->requester_id === auth()->user()->id){
            if($accountpayable->status === 'pending' || $accountpayable->status === 'rejected by manager'){
                return view('accountpayables.create.step-1', [
                  'property' => $property,
                  'accountpayable' => $accountpayable
                ]);
            }else{
                return view('accountpayables.pending-approval-manager',[
                    'accountpayable' => $accountpayable
                ]);
            }
        }else{
            return view('accountpayables.restricted-page',[
                'accountpayable' => $accountpayable
            ]);
        }
    }

    public function create_step_2(Property $property, AccountPayable $accountpayable){
        //accessible only to the first approver
            if($accountpayable->status === 'pending'){
                if($accountpayable->approver_id === auth()->user()->id){
                     return view('accountpayables.create.step-2', [
                        'property' => $property,
                        'accountpayable' => $accountpayable
                     ]);
                   
                }else{
                     return view('accountpayables.pending-approval-manager',[
                        'accountpayable' => $accountpayable
                     ]);
                }
            }elseif($accountpayable->status === 'approved by manager'){
                return view('accountpayables.approved-page',[
                    'accountpayable' => $accountpayable
                ]);
            }
            
            else{
                return view('accountpayables.restricted-page',[
                    'accountpayable' => $accountpayable
                ]);
            }
        // }else{

        // }
      
    }

    public function create_step_3(Property $property, AccountPayable $accountpayable){
        //accessible only to the second approver
         if($accountpayable->approver2_id === auth()->user()->id || Session::get('role_id') === 4){
                if($accountpayable->status === 'approved by manager'){
                      return view('accountpayables.create.step-3', [
                      'property' => $property,
                      'accountpayable' => $accountpayable
                      ]);
                }else{
                     return view('accountpayables.pending-approval-ap',[
                     'accountpayable' => $accountpayable
                     ]);
                }
            }else{
                 return view('accountpayables.restricted-page',[
                    'accountpayable' => $accountpayable
                ]);
            }
    }

    public function create_step_4(Property $property, AccountPayable $accountpayable){
        //accessible only to ap
         if(Session::get('role_id') === 4){
                if($accountpayable->status === 'approved by ap'){
                     return view('accountpayables.create.step-4', [
                        'property' => $property,
                        'accountpayable' => $accountpayable
                    ]);
                   
                }else{
                    return view('accountpayables.pending-approval-ap',[
                    'accountpayable' => $accountpayable
                    ]);
                }
            }else{
                return view('accountpayables.restricted-page',[
                 'accountpayable' => $accountpayable
                ]);
        }
    }

    public function create_step_5(Property $property, AccountPayable $accountpayable){
        //accessible only to the requestor
        if(auth()->user()->id === $accountpayable->requester_id){

                if($accountpayable->status === 'released'){

                    $particulars = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get();

                    foreach($particulars as $particular){
                      app('App\Http\Controllers\AccountPayableLiquidationParticularController')->store(
                      $particular->item,
                      $particular->price,
                      $particular->quantity,
                      $particular->batch_no,
                      $particular->total,
                      $particular->unit_uuid,
                      $particular->vendor_id
                      );
                    }

                     return view('accountpayables.create.step-5', [
                        'property' => $property,
                        'accountpayable' => $accountpayable
                    ]);
                   
                }else{
                    return view('accountpayables.pending-approval-manager',[
                    'accountpayable' => $accountpayable
                    ]);
                }
        }else{
                return view('accountpayables.restricted-page',[
                    'accountpayable' => $accountpayable
                ]);
        }
    }

    public function create_step_6(Property $property, AccountPayable $accountpayable){
        //accessible only to the first approver
       if($accountpayable->approver_id === auth()->user()->id){ 
                if($accountpayable->status === 'liquidated'){
                     return view('accountpayables.create.step-6', [
                     'property' => $property,
                     'accountpayable' => $accountpayable
                     ]);
                   
                }else{
                     return view('accountpayables.approved-page',[
                     'accountpayable' => $accountpayable
                     ]);
                }
            }else{
                return view('accountpayables.restricted-page',[
                    'accountpayable' => $accountpayable
                ]);
            }
    }

    public function create_step_7(Property $property, AccountPayable $accountpayable){

        //accessible only to ap
        if(Session::get('role_id') === 4){
            // if($accountpayable->status === 'liquidation approved by manager'){

                if(Session::get('skipLiquidation')){

                      AccountPayableLiquidation::updateOrCreate(
                      [
                        'batch_no' => $accountpayable->batch_no
                      ],
                      [
                      'name' => auth()->user()->name,
  
        
                      'cv_number' => sprintf('%08d',AccountPayable::where('property_uuid',$accountpayable->property->uuid)->where('status','!=', 'pending')->count())
                      ]);


                    $particulars = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get();

                    foreach($particulars as $particular){
                      app('App\Http\Controllers\AccountPayableLiquidationParticularController')->store(
                      $particular->item,
                      $particular->price,
                      $particular->quantity,
                      $particular->batch_no,
                      $particular->total,
                      $particular->unit_uuid,
                      $particular->vendor_id
                      );
                    }
                }

                return view('accountpayables.create.step-7', [
                    'property' => $property,
                    'accountpayable' => $accountpayable
                ]);
            // }else{
            //     return view('accountpayables.approved-page',[
            //         'accountpayable' => $accountpayable
            //     ]);
            // }   
        }else{
            return view('accountpayables.restricted-page',[
                'accountpayable' => $accountpayable
            ]);
        }
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

        return back()->with('success', 'Changes Saved!');
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

    // $this->authorize('is_account_payable_create_allowed');
           
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

    public function update_approval($accountpayable_id, $status, $comment, $vendor){
        AccountPayable::where('id', $accountpayable_id)
        ->update([
        'status' => $status,
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
