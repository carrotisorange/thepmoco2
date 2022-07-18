<?php

namespace App\Http\Controllers;

use App\Models\Point;
use DB;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Contract;
use App\Models\Unit;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Owner;


class DashboardDevController extends Controller
{
    public function index()
    {
        $this->authorize('dev');

         $sessions = DB::table('sessions')
         ->whereDate('created_at', Carbon::today())
         ->get();

         $properties = Property::all();

         $users = User::all();

         $units = Unit::all();

         $tenants = Tenant::all();
            
         $owners = Owner::all();

         $contracts = Contract::all();

         $points = Point::orderBy('total', 'desc')
         ->selectRaw('sum(point) as total, users.name as name')
         ->leftJoin('users', 'points.user_id', 'users.id')
         ->groupBy('user_id')
         ->paginate(10);

         $properties_count_labels = $this->get_property_rate_dates();

         $users_count_values = $this->get_user_rate_values();

         $properties_count_values = $this->get_property_rate_values();

         $sessions_count_values = $this->get_session_rate_values();

         $get_session_rate_labels = $this->get_session_rate_labels();

         $get_property_type_labels = $this->get_property_type_labels();

         $get_property_type_values = $this->get_property_type_values();

         $get_property_tenant_type_values = $this->get_property_tenant_type_values();

         $get_property_tenant_type_labels = $this->get_property_tenant_type_labels();

         return view('dashboard.dev.index',[
            'sessions' => $sessions,
            'points' => $points,
            'properties' => $properties,
            'users' => $users,
            'units' => $units,
            'tenants' => $tenants,
            'contracts' => $contracts,
            'owners' => $owners,
            'users_count_values' => $users_count_values,
            'properties_count_labels' => $properties_count_labels,
            'properties_count_values' => $properties_count_values,
            'sessions_count_values' => $sessions_count_values,
            'get_property_type_labels' => $get_property_type_labels,
            'get_property_type_values' => $get_property_type_values,
            'get_property_tenant_type_values' => $get_property_tenant_type_values,
            'get_property_tenant_type_labels' => $get_property_tenant_type_labels,
            'get_session_rate_labels' => $get_session_rate_labels
         ]);
    }

        public function get_property_rate_dates()
        {
        return Property::select(DB::raw("(count(*)) as total_property"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        
        ->take(31)

        ->pluck('month_year');
        }


        public function get_user_rate_values()
        {
        return User::select(DB::raw("(count(*)) as total_user"),
        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
     
        ->take(31)

        ->pluck('total_user');
        }

        public function get_property_rate_values()
        {
        return Property::select(DB::raw("(count(*)) as total_property"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(10)
        ->pluck('total_property');
        }

        public function get_session_rate_labels()
        {
        return DB::table('sessions')->select(DB::raw("(count(*)) as total_session"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %D')) as date_year"))
        ->orderBy('created_at', 'desc')
        ->groupBy(DB::raw("date_year"))
        ->limit(30)
        ->pluck('date_year');
        }

        public function get_session_rate_values()
        {
         return DB::table('sessions')->select(DB::raw("(count(*)) as total_session"),
         DB::raw("(DATE_FORMAT(created_at,
         '%M %D')) as date_year"))
         ->orderBy('created_at', 'desc')
         ->groupBy(DB::raw("date_year"))
         ->limit(30)
         ->pluck('total_session');
        }

        public function get_property_type_labels()
        {
        return Property::
        leftJoin('types', 'properties.type_id', 'types.id')
        ->groupBy('type_id')
        ->pluck('type');
        }

        public function get_property_type_values()
        {
        return Property::select(DB::raw('count(*) as count'))
        ->groupBy('type_id')
        ->pluck('count');
        }

        public function get_property_tenant_type_labels()
        {
        return Tenant
        ::groupBy('type')
        ->pluck('type');
        }

        public function get_property_tenant_type_values()
        {
        return Tenant::select(DB::raw('count(*) as count'))
        ->groupBy('type')
        ->pluck('count');
        }

}
