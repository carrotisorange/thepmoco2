<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use \PDF;
use App\Models\Bill;
use App\Models\ConcernCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Concern;
use App\Models\Unit;

class TenantPortalController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portal.tenants.index',[
            'tenant' => Tenant::findOrFail($user->tenant_uuid)->tenant,
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts,
            'unpaid_bills' => Tenant::findOrFail($user->tenant_uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid']),
            'concerns' => Tenant::findOrFail($user->tenant_uuid)->concerns,
            'payments' => Tenant::findOrFail($user->tenant_uuid)->collections()->orderBy('created_at', 'desc')->limit(5)->get(),
        ]);
    }

    public function show_contracts($role_id, User $user)
    {        
        return view('portal.tenants.contracts',[
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts()->orderBy('start', 'desc')->get()
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portal.tenants.bills',[
            'bills' => $this->get_bills($user->tenant_uuid),
            'tenant' => Tenant::findOrFail($user->tenant_uuid),
            'unpaid_bills' => app('App\Http\Controllers\TenantBillController')->get_tenant_balance($user->tenant_uuid),
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

        return $pdf->download($tenant->tenant.'-soa.pdf');
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
        $pdf = PDF::loadView('portal.tenants.exports.bills', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'Statement of Accounts', null, 55, array(0,0,0),2,2,-30);

        return $pdf;
    }

    public function show_collections($role_id, User $user)
    {
        return view('portal.tenants.collections',[
            'collections' => Tenant::findOrFail($user->tenant_uuid)->acknowledgementreceipts()->orderBy('ar_no','desc')->get()
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portal.tenants.concerns',[
            'concerns' => Tenant::find($user->tenant_uuid)->concerns,
            'categories' => ConcernCategory::all(),
            'units' => Tenant::findOrFail($user->tenant_uuid)->contracts
        ]);
    }

    public function store_concern(Request $request, $role_id, User $user){

        $attributes = request()->validate([
            'initial_assessment' => 'required',
            'category_id' => ['required', Rule::exists('concern_categories', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'concern' => 'required',
        ]);

        $attributes['tenant_uuid'] = $user->tenant_uuid;
        $attributes['property_uuid'] = Unit::findOrFail($request->unit_uuid)->property_uuid;
        $attributes['status'] = 'pending';

        $concern = Concern::create($attributes);

        return redirect('/'.$role_id.'/tenant/'. auth()->user()->username .'/concerns/'.$concern->id)->with('success','Concern is reported successfully.');
    }

    public function edit_concern($role_id, User $user, Concern $concern)
    {
        return view('portal.tenants.edit-concern',[
            'concern' => $concern,
        ]);
    }
}
