<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Unit;
use App\Models\Owner;
use App\Models\Property;
use Session;

class BankController extends Controller
{
    public function create(Property $property, Unit $unit, Owner $owner)
    {
        Session::put('owner_uuid', $owner->uuid);

        return view('banks.create',[
            'unit' => $unit,
            'owner' => $owner,
        ]);
    }

    public function store($bank_name, $account_name, $account_number, $owner_uuid)
    {
        Bank::create([
         'bank_name' => $bank_name,
         'account_name' => $account_name, 
         'account_number' => $account_number,
         'owner_uuid' => $owner_uuid
      ]);
    }

    public function destroy($id)
    {
        $bank = Bank::where('id', $id);
        $bank->delete();

        return back()->with('success', 'Success!');
    }
}
