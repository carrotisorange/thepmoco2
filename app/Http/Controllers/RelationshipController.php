<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relationship;

class RelationshipController extends Controller
{
    public function index()
    {
        return Relationship::all();
    }
}
