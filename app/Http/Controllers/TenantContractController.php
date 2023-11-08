<?php

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\Property;
use Session;

class TenantContractController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {
        return view('features.tenants.contracts.index',[
            'tenant' => Tenant::find($tenant->uuid),
            'contracts' => Tenant::find($tenant->uuid)->contracts()->orderBy('created_at', 'desc')->get(),
            'units' => Property::find(Session::get('property_uuid'))->units()->where('status_id', '1')->get(),
        ]);
    }

    public function edit(Request $request, Tenant $tenant, Unit $unit)
    {
        return redirect('/tenant/'.$tenant->uuid.'/unit/'.$unit->uuid.'/contract/create');
    }

    public function create(Property $property, Tenant $tenant)
    {
        Session::put('tenant_uuid', $tenant->uuid);
        return view('features.units.index', [
            'property' => $property,
            'tenant' => $tenant,
            'batch_no' => '',
        ]);
    }

    public function show_tenant_contracts($tenant_uuid)
    {
        return Tenant::find($tenant_uuid)->contracts()->groupBy('unit_uuid')->get();
    }



}
