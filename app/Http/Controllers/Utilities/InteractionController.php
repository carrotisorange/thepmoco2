<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Interaction;

class InteractionController extends Controller
{
    public function index(){
        return Interaction::whereNotIn('id', ['8','9'])->get();
    }
}
