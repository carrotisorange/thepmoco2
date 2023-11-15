<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Feature;
use Spatie\Browsershot\Browsershot;
use Session;
use App\Models\{Property,AccountPayable,AccountPayableParticular};

class RFPController extends Controller
{
    public function index(Property $property, $status=null)
    {
        $featureId = 13; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.rfps.index',[
            'accountpayables' => Property::find(Session::get('property_uuid'))->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
            'property' => $property
        ]);
    }

    public function getAccountPayables($property_uuid){
        return Property::find($property_uuid)->accountpayables();
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

          $pdf = \PDF::loadView('features.rfps.export', $data);

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
        return view('features.rfps.show',[
            'accountpayable' => $accountPayable,
            'particulars' => AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get()
        ]);
    }

    public function download(Property $property, AccountPayable $accountPayable){
       $data = [
        'accountpayable' => $accountPayable,
        'particulars' => AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get()
       ];

       $pdf = \PDF::loadView('features.rfps.download', $data);

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

        return redirect('/property/'.$property->uuid.'/rfp/'.$account_payable->id.'/step-1')->with('success', 'Changes Saved!');

    }

    public function download_step_1(Property $property, AccountPayable $accountpayable){

        $particulars = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get();

        $data = [
            'accountpayable' => $accountpayable,
            'particulars' => $particulars
         ];

         $pdf = \PDF::loadView('features.rfps.pdf.step1', $data);

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

        $featureId = 13;

        $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $subfeaturesArray = explode(",", $subfeatures);

        if($accountpayable->requester_id == auth()->user()->id){
            if($accountpayable->status=="pending" || $accountpayable->status=="rejected by manager"){
                return view('features.rfps.create.step-1', [
                  'property' => $property,
                  'accountpayable' => $accountpayable,
                  'subfeaturesArray' => $subfeaturesArray
                ]);
            }else{
                return view('features.rfps.pending-approval-manager',[
                    'accountpayable' => $accountpayable,
                    'subfeaturesArray' => $subfeaturesArray
                ]);
            }
        }else{
            return view('features.rfps.restricted-page',[
                'accountpayable' => $accountpayable,
                'subfeaturesArray' => $subfeaturesArray
            ]);
        }
    }

    public function create_step_2(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

            if($accountpayable->status== "pending"){
                if($accountpayable->approver_id === auth()->user()->id){
                     return view('features.rfps.create.step-2', [
                        'property' => $property,
                        'accountpayable' => $accountpayable,
                        'subfeaturesArray' => $subfeaturesArray
                     ]);

                }else{
                     return view('features.rfps.pending-approval-manager',[
                        'accountpayable' => $accountpayable,
                        'subfeaturesArray' => $subfeaturesArray
                     ]);
                }
            }elseif(($accountpayable->status=="approved by")){
                return view('features.rfps.approved-page',[
                    'accountpayable' => $accountpayable,
                    'subfeaturesArray' => $subfeaturesArray
                ]);
            }

            else{
                return view('features.rfps.restricted-page',[
                    'accountpayable' => $accountpayable,
                    'subfeaturesArray' => $subfeaturesArray
                ]);
            }
    }

    public function create_step_3(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

         if($accountpayable->approver2_id == auth()->user()->id || Session::get('role_id') == 4){
                if(($accountpayable->status=="approved by manager")){
                      return view('features.rfps.create.step-3', [
                      'property' => $property,
                      'accountpayable' => $accountpayable,
                        'subfeaturesArray' => $subfeaturesArray
                      ]);
                }else{
                     return view('features.rfps.pending-approval-ap',[
                     'accountpayable' => $accountpayable,
                       'subfeaturesArray' => $subfeaturesArray
                     ]);
                }
            }else{
                 return view('features.rfps.restricted-page',[
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                ]);
            }
    }

    public function create_step_4(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

         if(Session::get('role_id') == 4){
                if(($accountpayable->status=="approved by ap")){
                     return view('features.rfps.create.step-4', [
                        'property' => $property,
                        'accountpayable' => $accountpayable,
                          'subfeaturesArray' => $subfeaturesArray
                    ]);

                }else{
                    return view('features.rfps.pending-approval-ap',[
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                    ]);
                }
            }else{
                return view('features.rfps.restricted-page',[
                 'accountpayable' => $accountpayable,
                   'subfeaturesArray' => $subfeaturesArray
                ]);
        }
    }

    public function create_step_5(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

        if(auth()->user()->id == $accountpayable->requester_id){

                if(($accountpayable->status=="released")){

                    $particulars = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get();

                    foreach($particulars as $particular){
                      app('App\Http\Controllers\Subfeatures\AccountPayableLiquidationParticularController')->store(
                      $particular->item,
                      $particular->price,
                      $particular->quantity,
                      $particular->batch_no,
                      $particular->total,
                      $particular->unit_uuid,
                      $particular->vendor_id
                      );
                    }

                     return view('features.rfps.create.step-5', [
                        'property' => $property,
                        'accountpayable' => $accountpayable,
                          'subfeaturesArray' => $subfeaturesArray
                    ]);

                }else{
                    return view('features.rfps.pending-approval-manager',[
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                    ]);
                }
        }else{
                return view('features.rfps.restricted-page',[
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                ]);
        }
    }

    public function create_step_6(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

       if($accountpayable->approver_id === auth()->user()->id){
                if(($accountpayable->status=="liquidated")){
                     return view('features.rfps.create.step-6', [
                     'property' => $property,
                     'accountpayable' => $accountpayable,
                       'subfeaturesArray' => $subfeaturesArray
                     ]);

                }else{
                     return view('features.rfps.approved-page',[
                     'accountpayable' => $accountpayable,
                       'subfeaturesArray' => $subfeaturesArray
                     ]);
                }
            }else{
                return view('features.rfps.restricted-page',[
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                ]);
            }
    }

    public function create_step_7(Property $property, AccountPayable $accountpayable){

          $featureId = 13;

          $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

          $subfeaturesArray = explode(",", $subfeatures);

         if($accountpayable->approver2_id == auth()->user()->id){
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
                      app('App\Http\Controllers\Subfeatures\AccountPayableLiquidationParticularController')->store(
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

                return view('features.rfps.create.step-7', [
                    'property' => $property,
                    'accountpayable' => $accountpayable,
                      'subfeaturesArray' => $subfeaturesArray
                ]);

        }else{
            return view('features.rfps.restricted-page',[
                'accountpayable' => $accountpayable,
                  'subfeaturesArray' => $subfeaturesArray
            ]);
        }
    }




    public function create_request_status($property_uuid){
        return view('features.rfps.create.request-status');
    }

    public function create_request_comment($property_uuid){
        return view('features.rfps.create.request-comment');
    }

    //pdf

    public function create_step1(Property $property, AccountPayable $accountPayable){
        $html = view('features.rfps.pdf.step1',[
            'property' => $property,
            'accountPayable' => $accountPayable
        ])->render();

        Browsershot::html('<h1>Hello world!!</h1>')->save('example.pdf');

        // Browsershot::html($html)->save(storage_path('app/'.$accountPayable->id.'.pdf'));

        return "Done";
    }

    public function create_step2($property_uuid){
        return view('features.rfps.pdf.step2');
    }

    public function create_step3($property_uuid){
        return view('features.rfps.pdf.step3');
    }

    public function create_step4($property_uuid){
        return view('features.rfps.pdf.step4');
    }

    public function create_step5($property_uuid){
        return view('features.rfps.pdf.step5');
    }

    public function create_step6($property_uuid){
        return view('features.rfps.pdf.step6');
    }

    public function approve($property_uuid, $id)
    {
        AccountPayable::where('id', $id)
        ->update([
            'approver_id' => auth()->user()->id,
            'approved_at' => Carbon::now(),
            'status' => 'approved'
        ]);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.rfps.create');
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



}
