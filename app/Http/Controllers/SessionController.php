<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Carbon\Carbon;
use DB;

class SessionController extends Controller
{
    public function store()
    {
        Session::firstOrNew([
            'user_id' => auth()->user()->id,
            'created_at' => now(),
            'ip_address' => request()->ip(),
        ]);
    }

    public function update()
    {
        DB::table('sessions')
        ->where('user_id', auth()->user()->id)
        ->whereDate('created_at', Carbon::today())
        ->update([
                'updated_at' => now()
        ]);
    }
}
