<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use App\Models\UserProperty;
use Session;
use DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Bill;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\AcknowledgementReceipt;
use App\Models\Unit;
use App\Models\UnitStats;
use App\Models\Collection;
use App\Models\AccountPayable;
use App\Models\Role;
use App\Models\Owner;
use App\Models\Guest;

class PropertyController extends Controller
{   
    public function index()
    {        
        $this->destroy_property_session();

        $this->is_user_allowed_to_access(auth()->user()->status);

        $current_user_role_id = auth()->user()->role_id;

        $current_user_username = auth()->user()->username;

        $sales = '12';

        $dev = '10';

        $tenant = '8';

        $owner = '7';
        
        if($current_user_role_id == $sales)
        {
            return redirect('/dashboard/sales');
        }
        elseif($current_user_role_id == $dev)
        {   
           return redirect('/dashboard/dev');
        }
        elseif($current_user_role_id == $tenant)
        {
            return redirect($current_user_role_id.'/tenant/'.$current_user_username.'/contracts');
        }
        elseif($current_user_role_id == $owner)
        {
            return redirect($current_user_role_id.'/owner/'.$current_user_username.'/units');
        }
        elseif($current_user_role_id != ['12', '10', '8', '7'])
        {
            return view('properties.index');
        }
    }

    public function create($random_str)
    {
        // $this->authorize('is_portfolio_create_allowed');
        
        return view('properties.create', [
            'random_str' => $random_str,
            'types' => Type::all(),
        ]);
    }

   
    public function store($validatedData)
    {
         $validatedData['uuid'] = Str::uuid();

         $validatedData['mobile'] = auth()->user()->mobile;
         $validatedData['email'] = auth()->user()->email;

         if(!$validatedData['country_id'])
         {
            $validatedData['country_id'] = '247';
         }

         if(!$validatedData['province_id'])
         {
            $validatedData['province_id'] = '4121';
         }

         if(!$validatedData['city_id'])
         {
            $validatedData['city_id'] = '48315';
         }

         if($validatedData['thumbnail']){
             $validatedData['thumbnail'] = $validatedData->thumbnail->store('thumbnails');
         }else{
             $validatedData['thumbnail'] = 'thumbnails/thumbnail.png';
         }

        return Property::create($validatedData);
    }

    public function get_occupancy_rate_dates($value)
    {
        $occupancy_dates = '';

        if($value == '30_days')
        {
            $start = Carbon::now()->subDays(30);
             $end = Carbon::now();

             $occupancy_dates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
             DB::raw('MAX(occupied)'),
             DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
             ->where('property_uuid', Session::get('property_uuid'))
             ->whereBetween('created_at', [$start, $end])
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
           
             ->pluck('month_year');
        }elseif($value == '90_days')
        {
             $start = Carbon::now()->subDays(90);
             $end = Carbon::now();

             $occupancy_dates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
             DB::raw('MAX(occupied)'),
             DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
             ->where('property_uuid', Session::get('property_uuid'))
             ->whereBetween('created_at', [$start, $end])
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
           
             ->pluck('month_year');
        }else{
            $occupancy_dates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
            DB::raw('MAX(occupied)'),
            DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
            ->where('property_uuid', Session::get('property_uuid'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))

            ->pluck('month_year');
        }

        return $occupancy_dates;
       
    }

    public function get_occupancy_rate_values($value)
    {

         $occupancy_rates = '';

         if($value == '30_days')
         {
         $start = Carbon::now()->subDays(30);
         $end = Carbon::now();

          $occupancy_rates =  UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
          DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
          ->where('property_uuid', Session::get('property_uuid'))
          ->whereBetween('created_at', [$start, $end])
          ->orderBy('created_at')
          ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
          ->pluck('occupancy_rate');

         }elseif($value == '90_days'){
         $start = Carbon::now()->subDays(90);
         $end = Carbon::now();

         $occupancy_rates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
         DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
         ->where('property_uuid', Session::get('property_uuid'))
         ->whereBetween('created_at', [$start, $end])
         ->orderBy('created_at')
         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
         ->pluck('occupancy_rate');

         }else{
            $occupancy_rates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
            DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
            ->where('property_uuid', Session::get('property_uuid'))
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('occupancy_rate');
         }
         return $occupancy_rates;

    }

    public function get_current_occupancy_rate($property_uuid)
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
        DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', $property_uuid)
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()
        ->last();
    }

    public function get_collection_rate_dates($value)
    {
        return AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"), DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
         ->whereYear('created_at', Carbon::now()->format('Y'))
        ->pluck('month_year');
    }

    public function get_collection_rate_values($value)
    {
        return AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
        DB::raw("(DATE_FORMAT(created_at,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
          ->whereYear('created_at', Carbon::now()->format('Y'))
        ->pluck('total_amount');
    }

    public function get_expense_rate_values($value)
    {
        return AccountPayable::select(DB::raw("(sum(amount)) as total_amount"),
        DB::raw("(DATE_FORMAT(updated_at,
        '%M %Y')) as month_year"))
        ->where('status', 'approved')
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('updated_at')
        ->groupBy(DB::raw("DATE_FORMAT(updated_at, '%m-%Y')"))
        ->whereYear('updated_at', Carbon::now()->format('Y'))
        ->pluck('total_amount');
    }

    public function get_bill_rate_values()
    {
        return Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as
        month_year"))
        ->orderBy('created_at')
        ->where('property_uuid', Session::get('property_uuid'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('total_bill');
    }

    public function get_current_collection_rate()
    {
        $current_collection_rate = 0;

        if(Bill::where('property_uuid', Session::get('property_uuid'))->count())
        {
            $current_collection_rate = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->where('property_uuid', Session::get('property_uuid'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_amount')
            ->last() / Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->orderBy('created_at')
            ->where('property_uuid', Session::get('property_uuid'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_bill')
            ->last() * 100;
         }else{
            $current_collection_rate = 0;
         }

         return $current_collection_rate;
    }

    public function get_tenant_type_labels()
    {
        return Tenant::
        where('property_uuid', Session::get('property_uuid'))
        ->groupBy('type')
        ->pluck('type');
    }

    public function get_tenant_type_values()
    {
        return Tenant::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property_uuid'))
        ->groupBy('type')
        ->pluck('count');
    }

    public function get_delinquents($user_type)
    {
        $delinquents = array();

        if($user_type == 'tenant'){
            $tenants = Tenant::where('property_uuid', Session::get('property_uuid'))->get();

            foreach($tenants as $tenant){
            
            $balance = Bill::where('tenant_uuid', $tenant->uuid)->posted()->sum('bill') - Collection::where('tenant_uuid', $tenant->uuid)->posted()->sum('collection');
        
            if($balance > 0){
                $delinquents[] = [
                    'balance' => $balance,
                    'tenant' => $tenant->tenant,
                    'tenant_uuid' => $tenant->uuid,
                ];
            } 

            return $delinquents;
        }

        }elseif($user_type == 'owner'){
            $owners = Owner::where('property_uuid', Session::get('property_uuid'))->get();

            foreach($owners as $owner){
            $balance = Bill::where('owner_uuid', $owner->uuid)->posted()->sum('bill') - Collection::where('owner_uuid', $owner->uuid)->posted()->sum('collection');
        
            if($balance > 0){
                $delinquents[] = [
                    'balance' => $balance,
                    'owner' => $owner->owner,
                    'owner_uuid' => $owner->uuid,
                ];
            } 

        }

        return $delinquents;

        }else{

            $guests = Guest::where('property_uuid', Session::get('property_uuid'))->get();

            foreach($guests as $guest){
            $balance = Bill::where('guest_uuid', $guest->uuid)->posted()->sum('bill') - Collection::where('guest_uuid', $guest->uuid)->posted()->sum('collection');
        
            if($balance > 0){
                $delinquents[] = [
                    'balance' => $balance,
                    'guest' => $guest->guest,
                    'guest_uuid' => $guest->uuid,
                ];
            } 

        }

            return $delinquents;

        }
    }

    public function get_tenant_movein_values()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M')) as month_year"))
        ->orderBy('start')
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('status', 'active')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('count');
    }

    public function get_tenant_movein_labels()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('start')
        ->where('status', 'active')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('month_year');
    }

    public function get_tenant_moveout_values()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(moveout_at,
        '%M')) as month_year"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('status', 'inactive')
        ->orderBy('moveout_at')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('month_year');
    }

    public function get_reasons_for_moveout_values()
    {
        return Contract::select('moveout_reason')
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('moveout_reason','!=', "NA")
        ->groupBy('moveout_reason')
        ->pluck('moveout_reason');
    }

    public function get_reasons_for_moveout_labels()
    {
        return Contract::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property_uuid'))
        ->where('moveout_reason','!=', "NA")
        ->where('status', 'inactive')
        ->groupBy('moveout_reason')
        ->pluck('count');
    }

    public function get_property_collections($property_uuid)
    {
        return AcknowledgementReceipt::where('property_uuid',$property_uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("amount");
    }

    public function get_bills($property_uuid)
    {
        return Bill::where('property_uuid',$property_uuid)
        ->whereMonth('created_at',date('m'))
        ->sum("bill");
    }


    public function store_timestamps($property_uuid)
    {
        $timestamps = DB::table('timestamps')
        ->where('user_id', auth()->user()->id)
        ->where('property_uuid', $property_uuid)
        ->whereDate('created_at', Carbon::today())
        ->count();

        if($timestamps<=0){ 
            DB::table('timestamps')
              ->insert([
                'user_id' => auth()->user()->id,
                'property_uuid' => $property_uuid,
                'created_at' => now(),
                'ip_address' => request()->ip(),
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */

    public function update_property_note_to_bill($property_uuid, $note)
    {
        return Property::where('uuid',$property_uuid)->update([
            'note_to_bill' => $note,
        ]);
    }

    public function success(Property $property)
    {
        return view('properties.success', [
            'property' => $property
        ]);
    }

    public function show(Property $property)
    {  
        app('App\Http\Controllers\PropertyController')->store_property_session($property->uuid);

        // $this->authorize('is_portfolio_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',1);

        $this->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.show',[
            'property' => $property,
        ]); 
    }

    
    public function save_unit_stats($property_uuid)
    {
        UnitStats::firstOrCreate([
            'total' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, '', '', '')->count(),
            'vacant' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 1,'', '')->count(),
            'occupied' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 2,'', '')->count(),
            'dirty' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 3,'', '')->count(),
            'reserved' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 4,'', '')->count(),
            'under_maintenance' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 5,'', '')->count(),
            'pending' => app('App\Http\Controllers\UnitController')->get_property_units($property_uuid, 6,'', '')->count(),
            'property_uuid' => $property_uuid
        ]);

    }

    public function edit(Property $property)
    { 
        // $this->authorize('is_portfolio_update_allowed');

        return view('properties.edit',[
            'property_details' => $property,
        ]);
    }

    public function destroy($uuid)
    {
        // $this->authorize('is_portfolio_delete_allowed');

        if(!auth()->user()->role_id == '5')
        {
            abort(403);
        }else{
            Unit::where('property_uuid', $uuid)->delete();
            Tenant::where('property_uuid', $uuid)->delete();
            Bill::where('property_uuid', $uuid)->delete();
            Collection::where('property_uuid', $uuid)->delete();
            AcknowledgementReceipt::where('property_uuid', $uuid)->delete();
            Contract::where('property_uuid', $uuid)->delete();
            Property::where('uuid', $uuid)->delete();
            UserProperty::where('property_uuid')->delete();
        
             return redirect('/properties')->with('success','Property is successfully deleted.');
        }
       
    }

    public function show_tenant_contract($uuid)
    {
        return view('properties.show-tenant-contract',[
            'property' => Property::find($uuid),
        ]);
    }

     public function show_owner_contract($uuid)
     {
        return view('properties.show-owner-contract',[
            'property' => Property::find($uuid),
        ]);
     }

     //other functions

    public function destroy_property_session()
    {
        Session::forget('property');
        Session::forget('property_name');
        Session::forget('role');
        Session::forget('role_id');
        Session::forget('is_approved');
        Session::forget('is_account_owner');

    }

    public function store_property_session($property_uuid)
    {
        Session::put('property_uuid', $property_uuid);

        Session::put('property', Property::find($property_uuid)->property);

        Session::put('role', Role::find(UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('role_id')->first())->role);

        Session::put('role_id', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('role_id')->first());

        Session::put('is_approved', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('is_approved')->first());

        Session::put('is_account_owner', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('is_account_owner')->first());

        Session::put('property_email', Property::find($property_uuid)->email);
        
        Session::put('property_mobile', Property::find($property_uuid)->mobile);

        Session::put('property_thumbnail', Property::find($property_uuid)->thumbnail);
        
    }

    public function unlock($property_uuid)
    {
        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',20);

        return view('admin.restrictedpages.portfolio');
    }

    public function is_property_exist()
    {
        if(!User::find(auth()->user()->id)->user_properties->count()){
            return true; 
        }else{ 
            return false; 
        } 
    }

    public function generate_uuid()
    {
        return Str::uuid();
    }

    public function is_user_allowed_to_access($status)
    {
        if($status === 'banned'){
            abort(403);
        }
    }
}
