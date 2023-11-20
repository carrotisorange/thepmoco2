<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class SessionController extends Controller
{
    public function store()
    {
        $sessions = DB::table('sessions')
         ->where('user_id', auth()->user()->id)
         ->whereDate('created_at', Carbon::today())
         ->count();

        if($sessions == 0)
        {
            DB::table('sessions')->insert([
             'user_id' => auth()->user()->id,
             'created_at' => now(),
             'ip_address' => request()->ip(),
            ]);
        }
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
