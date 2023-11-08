<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Http\Request;
use App\Models\Property;

class GuardianController extends Controller
{
    public function create(Property $property, Unit $unit, Tenant $tenant)
    {

        return view('guardians.create',[
            'unit' => Unit::find($unit->uuid),
            'tenant' => $tenant,
        ]);
    }

    public function store(Request $request, Tenant $tenant)
    {
         try{
            $attributes = request()->validate([
             'guardian' => 'required',
             'email' => ['nullable', 'string', 'email', 'max:255', 'unique:guardians'],
             'mobile_number' => 'required',
             'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            ]);

            $attributes['tenant_uuid'] = $tenant->uuid;

            DB::beginTransaction();

            Guardian::create($attributes);

            DB::commit();

           return redirect(url()->previous())->with('success', 'Changes Saved!');

         }catch(\Exception $e)
         {
            DB::rollback();
           return redirect(url()->previous())->with('error', $e);
         }

    }


    public function destroy(Property $property, Tenant $tenant, $guardian_id)
    {

       Guardian::destroy($guardian_id);

      return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}
