<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Unit;
use App\Models\Owner;
use App\Models\Property;

class BankController extends Controller
{
    public function create(Property $property, Unit $unit, Owner $owner)
    {
        return view('banks.create',[
        'unit' => $unit,
        'owner' => $owner,
        ]);
    }

    public function destroy($id)
    {
        $bank = Bank::where('id', $id);
        $bank->delete();

        return back()->with('success', 'Bank has been removed.');
    }
}
