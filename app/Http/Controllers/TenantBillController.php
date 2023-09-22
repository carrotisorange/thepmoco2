<?php

namespace App\Http\Controllers;


use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;

use App\Models\Collection;



class TenantBillController extends Controller
{
   
    public function show_tenant_bills($tenant_uuid)
    {
       return Bill::where('tenant_uuid', $tenant_uuid)->posted()->where('bill','>', 0)->orderBy('created_at','desc')->get();
    }

    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_tenant_balance($tenant_uuid)
    {
        return Bill::where('tenant_uuid', $tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->orderBy('bill_no','desc')->get();
    }

    public function destroy($tenant_uuid){
        Bill::where('tenant_uuid', $tenant_uuid)->delete();
    }
}
