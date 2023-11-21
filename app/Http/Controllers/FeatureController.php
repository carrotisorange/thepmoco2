<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function getSubfeatures($featureId){

        $subfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();
        $subfeaturesArray = explode(",", $subfeatures);

        return $subfeaturesArray;
    }
}
