<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Mail\SendPaymentToTenant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Collection;
use App\Models\Property;
use DB;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\DeedOfSale;
use Session;
use App\Models\PaymentRequest;

class TenantCollectionController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {
       app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);

        return view('tenants.collections.index',[
         'tenant' => Tenant::find($tenant->uuid),
          'collections' => app('App\Http\Controllers\TenantCollectionController')->get_tenant_collections($property->uuid, $tenant->uuid),
        ]);
    }

      public function get_tenant_collections($property_uuid, $tenant_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('property_uuid', $property_uuid)
        ->where('tenant_uuid', $tenant_uuid)
        ->posted()
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }

    public function edit(Property $property, Tenant $tenant, $batch_no)
    {   
      $collections = Bill::where('tenant_uuid', $tenant->uuid)
      ->where('batch_no', $batch_no)
      ->get();

      return view('tenants.collections.edit',[
         'collections' => $collections,
         'tenant' => $tenant,
         'batch_no' => $batch_no
      ]);
    }
}
