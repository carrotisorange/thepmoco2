<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
       
        $request->authenticate();

        $request->session()->regenerate();

         $sessions = DB::table('sessions')
         ->where('user_id', auth()->user()->id)
         ->whereDate('created_at', Carbon::today())
         ->count();

         if($sessions<=0) { DB::table('sessions')->insert(
             [
             'id' => DB::table('sessions')->count()+1,
             'user_id' => auth()->user()->id,
             'created_at' => now(),
             'ip_address' => request()->ip(),
             ]
             );
             }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        
          DB::table('sessions')
          ->where('user_id', auth()->user()->id)
          ->whereDate('created_at', Carbon::today())
          ->update([
          'updated_at' => now()
          ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

      

        return redirect('/login');
    }
}
