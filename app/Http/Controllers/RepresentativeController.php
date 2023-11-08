<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;
use App\Models\Owner;

class RepresentativeController extends Controller
{
    public function create(Property $property, Owner $owner)
    {
         return view('representatives.create',[
            'owner' => $owner,
         ]);
    }

    public function store($representative, $email, $mobile_number, $relationship_id, $owner_uuid)
    {
        return Representative::create([
            'representative' => $representative,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'relationship_id' => $relationship_id,
            'owner_uuid' => $owner_uuid,
        ])->id;

    }

    public function destroy($id)
    {
        $guardian = Representative::where('id', $id);
        $guardian->delete();

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}
