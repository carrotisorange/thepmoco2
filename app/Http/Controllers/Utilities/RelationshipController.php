<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Relationship;

class RelationshipController extends Controller
{
    public function index()
    {
        return Relationship::all();
    }
}
