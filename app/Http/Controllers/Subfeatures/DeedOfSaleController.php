<?php

namespace App\Http\Controllers\Subfeatures;

use App\Http\Controllers\Controller;
use App\Models\{DeedOfSale,Unit,Owner,Property};

class DeedOfSaleController extends Controller
{
    public function show_unit_deed_of_sales($unit_uuid)
    {
        return Unit::findOrFail($unit_uuid)->deed_of_sales()->paginate(5);
    }

    public function create(Property $property, Unit $unit, Owner $owner)
    {
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

        return view('deed_of_sale.edit',[
            'deedOfSale' => $deedOfSale
        ]);
    }

    public function destroy(Property $property, Unit $unit, OWner $owner, DeedOfSale $deedOfSale){

        DeedOfSale::where('uuid', $deedOfSale->uuid)->delete();

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}
