<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index($country_id)
    {
        return Province::orderBy('province', 'ASC')->where('country_id', $country_id)->get();
    }
}
