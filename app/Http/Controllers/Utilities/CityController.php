<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
    public function index($province_id)
    {
        return City::orderBy('city', 'ASC')->where('province_id', $province_id)->get();
    }
}
