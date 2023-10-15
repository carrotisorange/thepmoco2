<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Election;
use App\Models\Feature;
use Carbon\Carbon;
use Session;

class ElectionPolicyFormController extends Controller
{
    public function create(Property $property){
        return view('elections.policy-form.create');
    }
}
