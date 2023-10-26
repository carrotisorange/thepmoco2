<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProperty;
use DB;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\Property;
use App\Models\Unit;

class SalesPortalController extends Controller
{
    public function signup()
    {
        return view('portals.sales.signups',[
            'signups' => User::where('role_id', '5')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function personnel()
    {
        return view('portals.sales.personnels',[
            'personnels' => UserProperty::whereNotIn('role_id',['5', '7','8','10'])->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function property($role_id, $username, $user_id)
    {
        $properties = User::findOrFail($user_id)->user_properties()->whereNotNull('user_id')->orWhereNotNull('property_uuid')->get();

        return view('portals.sales.properties',[
            'properties'=> $properties,
            'user' => User::find($user_id)
        ]);
    }

    public function session()
    {
        return view('portals.sales.sessions',[
            'sessions'=>DB::table('sessions')->whereDate('created_at', Carbon::now())->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function statistics()
    {
        $buildings = Property::count();
        $units = Unit::count();
        $users = User::whereNotNull('email_verified_at')->where('role_id', 5)->count();
        $owners = Owner::count();
        $tenants = Tenant::count();
        $personnels = UserProperty::distinct('user_id')->where('role_id','!=', 5)->count();

        return view('portals.sales.statistics',[
            'buildings' => $buildings,
            'units' => $units,
            'users' => $users,
            'owners' => $owners,
            'tenants'=> $tenants,
            'personnels' => $personnels
        ]);
    }
}
