<?php

namespace App\Http\Controllers;

use App\Mail\SendBillToTenant;
use Illuminate\Http\Request;
use App\Models\Tenant;
use Session;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Bill;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use \PDF;
use App\Models\Collection;
use Illuminate\Support\Facades\Mail;

class TenantBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Property $property, Tenant $tenant)
    {            
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens', 10);

        return view('tenants.bills.index',[
            'tenant' => $tenant,  
            'property' => $property,
        ]);
    }

    

    public function show_tenant_bills($tenant_uuid)
    {
        return Tenant::find($tenant_uuid)->bills()->where('bill','>', 0)->orderBy('bill_no','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_tenant_balance($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->where('bill','>', 0)->orderBy('bill_no','desc')->get();
    }

    public function export(Request $request, Property $property, Tenant $tenant)
    {
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);
    
        $pdf = $this->generate_pdf($data, $property);

        return $pdf->download(Carbon::now()->format('M d, Y').'-'.$tenant->tenant.'-soa.pdf');
    }

    public function generate_pdf($data, $property)
    {
        $pdf = PDF::loadView('tenants.bills.export', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, substr_replace($property->property, "", 18), null, 50, array(0,0,0),1,1,-30);

        return $pdf;
    }

    public function send(Request $request, Property $property, Tenant $tenant)
    {    
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($tenant, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToTenant($data));

        return back()->with('success', 'Success!');
    }

    public function get_bill_data($tenant, $due_date, $penalty, $note)
    {
        return $data = [
            'tenant' => $tenant->tenant,
            'reference_no' => $tenant->bill_reference_no,
            'due_date' => $due_date,
            'penalty' => $penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => $this->get_tenant_balance($tenant->uuid),
            'note_to_bill' => $note,
        ];
    }

    public function destroy($tenant_uuid){
        Bill::where('tenant_uuid', $tenant_uuid)->delete();
    }
}
