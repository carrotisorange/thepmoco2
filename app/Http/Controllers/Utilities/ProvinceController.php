<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index($country_id)
    {
        return Province::orderBy('province', 'ASC')->where('country_id', $country_id)->get();
    }
}
