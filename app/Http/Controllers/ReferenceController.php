<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Models\Unit;
use App\Models\Tenant;
use Session;
use App\Models\References;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Property;

use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function create(Property $property, Unit $unit, Tenant $tenant)
    {
         return view('references.create',[
          'unit' => Unit::find($unit->uuid),
         'tenant' => $tenant,
         ]);
    }


    public function store(Request $request, Unit $unit, Tenant $tenant)
    {
           try{
           $attributes = request()->validate([
           'reference' => 'required',
           'email' => ['nullable', 'string', 'email', 'max:255', 'unique:references'],
           'mobile_number' => 'required',
           'relationship_id' => ['required', Rule::exists('relationships', 'id')],
           ]);

           $attributes['tenant_uuid'] = $tenant->uuid;

           DB::beginTransaction();

           Reference::create($attributes);

           DB::commit();

           return redirect(url()->previous())->with('success', 'Changes Saved!');

           }catch(\Exception $e)
           {
           DB::rollback();
          return redirect(url()->previous())->with('error', $e);
           }
    }

     public function destroy(Property $property, Tenant $tenant, $reference_id)
     {
        Reference::destroy($reference_id);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
     }
}
