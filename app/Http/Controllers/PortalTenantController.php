<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use \PDF;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Concern;
use Illuminate\Support\Facades\Storage;
use App\Models\PaymentRequest;
use Session;
use Carbon\Carbon;
use App\Models\Notification;

class PortalTenantController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portals.tenants.index',[
            'tenant' => Tenant::findOrFail($user->tenant_uuid)->tenant,
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts,
            'unpaid_bills' => Tenant::findOrFail($user->tenant_uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid']),
            'concerns' => Tenant::findOrFail($user->tenant_uuid)->concerns,
            // 'notifications' => app('App\Http\Controllers\NotificationController')->get_property_notifications(Tenant::find($user->tenant_uuid)->property->uuid),
        ]);
    }

    public function show_contracts($role_id, User $user)
    {        
        return view('portals.tenants.contracts',[
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts()->orderBy('start', 'desc')->get()
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portals.tenants.bills',[
            'tenant' => Tenant::findOrFail($user->tenant_uuid),
            'unpaid_bills' => app('App\Http\Controllers\TenantBillController')->get_tenant_balance($user->tenant_uuid),
            ''
        ]);
    }


    public function get_bills($tenant_uuid)
    {
          return Bill::where('tenant_uuid', $tenant_uuid)->orderBy('id','desc')->get();
    }
  

    public function export_bills($role_id, User $user)
    {
        $tenant = Tenant::findOrFail($user->tenant_uuid);

        $data = $this->get_bill_data($tenant);

        $pdf = $this->generate_pdf($data);

        return $pdf->stream($tenant->tenant.'-soa.pdf');
    }

    public function get_bill_data($tenant)
    {
         return $data = [
         'tenant' => $tenant->tenant,
         'reference_no' => $tenant->bill_reference_no,
         'user' => User::find(auth()->user()->id)->name,
         'role' => User::find(auth()->user()->id)->role->role,
         'bills' => $this->get_unpaid_bills($tenant->uuid),
         ];
    }

    public function get_unpaid_bills($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->where('bill','>', 0)->orderBy('bill_no','desc')->get();
    }

    public function generate_pdf($data)
    {
        $pdf = PDF::loadView('portals.tenants.exports.bills', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, "", null, 55, array(0,0,0),2,2,-30);

        return $pdf;
    }

    public function show_collections($role_id, User $user)
    {
        return view('portals.tenants.collections',[
            'collections' => Tenant::findOrFail($user->tenant_uuid)->acknowledgementreceipts()->orderBy('ar_no','desc')->get()
        ]);
    }

    public function show_collections_pending($role_id, User $user, $status)
    {   
        return view('portals.tenants.payment-requests',[
            'requests' => PaymentRequest::where('tenant_uuid', $user->tenant_uuid)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portals.tenants.concerns',[
            'concerns' => Tenant::find($user->tenant_uuid)->concerns()->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create_concerns($role_id, User $user)
    {
        return view('portals.tenants.create-concern',[
          'user' => $user
        ]);
    }

    public function success_concerns($role_id, User $user)
    {
        return view('portals.tenants.success-concern',[
          'user' => $user
        ]);
    }

    public function download_concerns($role_id, User $user, Concern $concern)
    {
        $attachment = $concern->image;

        return Storage::download(($attachment), 'AR_'.$concern->reference_no.'_'.$concern->tenant->tenant.'.png');
    }

    public function payment_request_edit($role_id, User $user, $batch_no)
    {

        return view('portals.tenants.edit-payment-request',[
            'payment_request' => PaymentRequest::where('batch_no', $batch_no)->get(),
        ]);
    }  
    
    public function payment_request_destroy($role_id, User $user, $batch_no)
    {
       PaymentRequest::where('batch_no', $batch_no)->delete();

      return redirect(auth()->user()->role_id.'/tenant/'. auth()->user()->username.'/bills/')->with('success', 'Success!');
    }  

    public function payment_request_update(Request $request, $role_id, User $user, $batch_no)
    {

        if($role_id !== '8')
        {
            PaymentRequest::where('batch_no', $batch_no)
            ->update([
            'reason_for_rejection' => $request->reason_for_rejection,
            'updated_at' => Carbon::now(),
            'status' => 'approved',
            'user_id' => $user->id
        ]);

                // Notification::create([
                //     'type' => 'payment request',
                //     'user_id' => $user->id,
                //     'details' => 'approved a payment request.',
                //     'status' => 'approved',
                //     'role_id' => $role_id,
                //     'property_uuid' => Session::get('property') 
                // ]);

         return redirect('/property/'.Session::get('property').'/collection/approved')->with('success', 'Success!');
        }
         else{
    
      if(!$request->proof_of_payment == null)
      {
        PaymentRequest::where('batch_no', $batch_no)
        ->update([
        'proof_of_payment' => $request->proof_of_payment->store('proof_of_payments'),
        'updated_at' => null,
        'mode_of_payment' => $request->mode_of_payment,
      ]);

        //   Notification::create([
        //   'type' => 'payment request',
        //   'user_id' => $user->id,
        //   'details' => 'uploaded a proof of payment.',
        //   'status' => 'pending',
        //     'role_id' => $role_id,
        //   'property_uuid' => Tenant::find($user->tenant_uuid)->property->uuid
        //   ]);

      } 

      return redirect(auth()->user()->role_id.'/tenant/'.
      auth()->user()->username.'/payments/declined')->with('success', 'Success!');


    }  
}


    public function payment_request_deny(Request $request, $role_id, User $user, $batch_no)
    {
        PaymentRequest::where('batch_no', $batch_no)
        ->update([
            'status' => 'declined',
            'reason_for_rejection' => $request->reason_for_rejection,
            'user_id' => $user->id
        ]);

        //    Notification::create([
        //         'type' => 'payment request',
        //         'user_id' => $user->id,
        //         'details' => 'approved a payment request.',
        //         'status' => 'declined',
        //         'role_id' => $role_id,
        //         'property_uuid' => Session::get('property') 
        //     ]);

        return redirect('/property/'.Session::get('property').'/collection/declined')->with('success', 'Success!');
    }


    public function payment_request_download($role_id, User $user, PaymentRequest $paymentrequest)
    {
        $proof_of_payment = $paymentrequest->proof_of_payment;

        return Storage::download(($proof_of_payment), 'AR_'.$user->username.'_'.$paymentrequest->batch_no.'.png');
    }

    
    public function edit_concern($role_id, User $user, Concern $concern)
    {
        return view('portals.tenants.edit-concern',[
            'concern' => $concern,
        ]);
    }
}
