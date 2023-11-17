<?php

namespace App\Http\Controllers\Portals;

use App\Http\Controllers\Controller;
use Session;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{User,Tenant,Bill,Collection,Bulletin,Contract,Concern,PaymentRequest};

class PortalTenantController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portals.tenants.index',[
            'tenant' => Tenant::findOrFail(Session::get('tenant_uuid'))->tenant,
            'contracts' => Tenant::findOrFail(Session::get('tenant_uuid'))->contracts,
            'unpaid_bills' => Tenant::findOrFail(Session::get('tenant_uuid'))->bills()->posted()->where('status', 'unpaid'),
            'concerns' => Tenant::findOrFail(Session::get('tenant_uuid'))->concerns,
        ]);
    }

    public function show_contracts($role_id, User $user)
    {
        Session::put('tenant_uuid', User::where('id', auth()->user()->id)->value('tenant_uuid'));

        $contracts = Contract::where('tenant_uuid', Session::get('tenant_uuid'))->get();

        return view('portals.tenants.contracts',[
            'contracts' => $contracts
        ]);
    }

    public function show_bulletin($role_id, User $user)
    {
        Session::put('tenant_uuid', User::where('id', auth()->user()->id)->value('tenant_uuid'));

        $property_uuid = Contract::where('tenant_uuid', Session::get('tenant_uuid'))->value('property_uuid');

        return view('portals.tenants.bulletins',[
            'bulletins' => Bulletin::where('property_uuid', $property_uuid)->where('is_approved',1)->orderBy('id','desc')->get()
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        $tenant = Tenant::findOrFail(Session::get('tenant_uuid'));

        $bills = Bill::where('tenant_uuid', Session::get('tenant_uuid'))->posted()->get();

        return view('portals.tenants.bills',[
            'tenant' => $tenant,
            'unpaid_bills' => $bills
        ]);
    }
        public function get_bills($tenant_uuid)
        {
        return Bill::where('tenant_uuid', $tenant_uuid)->posted()->orderBy('id','desc')->get();
        }
    public function export_bills($role_id, User $user)
    {
        $tenant = Tenant::findOrFail(Session::get('tenant_uuid'));

        $data = $this->get_bill_data($tenant);

        $folder_path = 'portals.tenants.exports.bills';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data);

        return $pdf->stream($tenant->tenant.'-soa.pdf');
    }

    public function get_bill_data($tenant)
    {
         return $data = [
         'tenant' => $tenant->tenant,
         'reference_no' => $tenant->bill_reference_no,
         'user' => User::find(auth()->user()->id)->name,
         'role' => User::find(auth()->user()->id)->role->role,
         'bills' => Bill::where('tenant_uuid', $tenant->uuid)->where('status', 'unpaid')->where('bill','>', 0)->orderBy('bill_no','desc')->get(),
         ];
    }

    public function show_collections($role_id, User $user)
    {
        return view('portals.tenants.collections',[
            'collections' => Collection::select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count"))
            ->where('tenant_uuid', Session::get('tenant_uuid'))
            ->posted()
            ->groupBy('ar_no')
            ->orderBy('ar_no', 'desc')
            ->get()
        ]);
    }

    public function show_collections_pending($role_id, User $user, $status)
    {
        return view('portals.tenants.payment-requests',[
            'requests' => PaymentRequest::where('tenant_uuid', Session::get('tenant_uuid'))->where('status', $status)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        $concerns = Concern::where('tenant_uuid',Session::get('tenant_uuid'))->orderBy('created_at', 'desc')->get();
        return view('portals.tenants.concerns',[
            'concerns' => $concerns,
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

      return redirect(auth()->user()->role_id.'/tenant/'. auth()->user()->username.'/bills/')->with('success', 'Changes Saved!');
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

         return redirect('/property/'.Session::get('property_uuid').'/collection/approved')->with('success', 'Changes Saved!');
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

      }

      return redirect(auth()->user()->role_id.'/tenant/'.
      auth()->user()->username.'/payments/declined')->with('success', 'Changes Saved!');

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

        return redirect('/property/'.Session::get('property_uuid').'/collection/declined')->with('success', 'Changes Saved!');
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
