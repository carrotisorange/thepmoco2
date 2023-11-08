<?php

namespace App\Http\Controllers;

use App\Models\Property;

class ElectionPolicyFormController extends Controller
{
    public function create(Property $property){
        return view('features.elections.policy-form.create');
    }
}
