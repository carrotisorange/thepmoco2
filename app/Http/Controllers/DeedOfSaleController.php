<?php

namespace App\Http\Controllers;

use App\Models\DeedOfSale;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Owner;
use App\Models\Property;

class DeedOfSaleController extends Controller
{
    public function show_unit_deed_of_sales($unit_uuid)
    {
        //$this->authorize('is_owner_portal_read_allowed');

        return Unit::findOrFail($unit_uuid)->deed_of_sales()->paginate(5);
    }

    public function create(Property $property, Unit $unit, Owner $owner)
    {
        //$this->authorize('is_owner_portal_create_allowed');

        return view('deed_of_sale.create',[
            'property' => $property,
            'unit' => $unit,
            'owner' => $owner
        ]);
    }

    public function backout(Property $property, Unit $unit, Owner $owner, DeedOfSale $deedOfSale)
    {
          return view('deed_of_sale.backout',[
          'deedOfSale' => $deedOfSale
          ]);
    }

    public function edit(Property $property, Unit $unit, Owner $owner, DeedOfSale $deedOfSale){
        //$this->authorize('is_owner_portal_update_allowed');

        return view('deed_of_sale.edit',[
            'deedOfSale' => $deedOfSale
        ]);
    }

    public function destroy(Property $property, Unit $unit, OWner $owner, DeedOfSale $deedOfSale){
        
       // $this->authorize('is_owner_portal_delete_allowed');

        DeedOfSale::where('uuid', $deedOfSale->uuid)->delete();
        
        return back()->with('success', 'Success!');
    }
}
