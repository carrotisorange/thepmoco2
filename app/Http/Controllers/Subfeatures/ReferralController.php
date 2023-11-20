<?php

namespace App\Http\Controllers\Subfeatures;

use App\Http\Controllers\Controller;
use Session;
use App\Models\{Referral,Property};


class ReferralController extends Controller
{
    public function index()
    {
        return view('referrals.index',[
            'referrals' => Property::find(Session::get('property_uuid'))->referrals
        ]);
    }

    public function store($referral, $contract_uuid, $property_uuid)
    {
        Referral::create([
           'referral' => $referral,
           'contract_uuid' => $contract_uuid,
           'property_uuid' => $property_uuid
        ]);
    }

    public function update($referral, $contract_uuid, $property_uuid)
    {
        Referral::where('contract_uuid', $contract_uuid)
        ->update([
            'referral' => $referral,
        ]);
    }
}
