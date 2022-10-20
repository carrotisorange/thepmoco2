<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\UserProperty;
use App\Models\PropertyParticular;
use App\Models\PropertyRole;
use Auth;
use Session;
use DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Bill;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\AcknowledgementReceipt;
use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\UnitStats;
use App\Models\Collection;
use App\Models\PaymentRequest;
use App\Models\AccountPayable;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_list_of_all_tenants($property_uuid)
    {
        return Property::find($property_uuid)->tenants;
    }

    
    public function destroy_property_session()
    {
        Session::forget('property');
        Session::forget('property_name');
    }

    public function store_property_session($property_uuid)
    {
        session(['property' => $property_uuid]);
        session(['property_name' => Property::find($property_uuid)->property]);
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


    public function index()
    {
        $this->destroy_property_session();

        // if(!$is_property_exist()){
        //    return redirect('/property/'.Str::random(8).'/create');  
        // }
        
        if(auth()->user()->role_id == '12')
        {
            return redirect('/dashboard/sales');
        }
        elseif(auth()->user()->role_id == '10')
        {   
           return redirect('/dashboard/dev');
        }
        elseif(auth()->user()->role_id == '8')
        {
            return redirect(auth()->user()->role_id.'/tenant/'.auth()->user()->username);
        }
        elseif(auth()->user()->role_id == '7')
        {
            return redirect(auth()->user()->role_id.'/owner/'.auth()->user()->username);
        }
        else
        {
            return view('properties.index',[
                'properties'=> User::find(Auth::user()->id)->user_properties()->paginate(4)
            ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($random_str)
    {
        $this->authorize('is_portfolio_create_allowed');
        
        return view('properties.create', [
            'random_str' => $random_str,
            'types' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'property' => 'required',
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'required|image',
            'description' => '',
        ]);

    try {
        DB::beginTransaction();

        $property_uuid = Str::uuid();

        $attributes['uuid']= $property_uuid;
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Property::create($attributes);

        app('App\Http\Controllers\UserPropertyController')->store(Session::get('property'),auth()->user()->id,true,true);

        for($i=1; $i<=5; $i++){
            PropertyParticular::create([
                'property_uuid'=> $property_uuid,
                'particular_id'=> $i,
                'minimum_charge' => 0.00,
                'due_date' => 28,
                'surcharge' => 1
            ]);
        }

        for($i=1; $i<=4; $i++){
            PropertyRole::create([
                'property_uuid'=> $property_uuid,
                'role_id'=> $i,
            ]);
        }

        DB::commit();

    }catch (\Throwable $e) {
            DB::rollback();
        }

    return redirect('/properties')->with('success', 'New property has been created.');
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
             ->where('property_uuid', Session::get('property'))
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
             ->where('property_uuid', Session::get('property'))
             ->whereBetween('created_at', [$start, $end])
             ->orderBy('created_at')
             ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
           
             ->pluck('month_year');
        }else{
            $occupancy_dates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
            DB::raw('MAX(occupied)'),
            DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
            ->where('property_uuid', Session::get('property'))
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
          ->where('property_uuid', Session::get('property'))
          ->whereBetween('created_at', [$start, $end])
          ->orderBy('created_at')
          ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
          ->pluck('occupancy_rate');

         }elseif($value == '90_days'){
         $start = Carbon::now()->subDays(90);
         $end = Carbon::now();

         $occupancy_rates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
         DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
         ->where('property_uuid', Session::get('property'))
         ->whereBetween('created_at', [$start, $end])
         ->orderBy('created_at')
         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
         ->pluck('occupancy_rate');

         }else{
            $occupancy_rates = UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
            DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
            ->where('property_uuid', Session::get('property'))
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
        ->where('property_uuid', Session::get('property'))
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
        ->where('property_uuid', Session::get('property'))
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
        ->where('property_uuid', Session::get('property'))
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
        ->where('property_uuid', Session::get('property'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->limit(6)
        ->pluck('total_bill');
    }

    public function get_current_collection_rate()
    {
        $current_collection_rate = 0;

        if(Bill::where('property_uuid', Session::get('property'))->count())
        {
            $current_collection_rate = AcknowledgementReceipt::select(DB::raw("(sum(amount)) as total_amount"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->where('property_uuid', Session::get('property'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_amount')
            ->last() / Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->orderBy('created_at')
            ->where('property_uuid', Session::get('property'))
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
        where('property_uuid', Session::get('property'))
        ->groupBy('type')
        ->pluck('type');
    }

    public function get_tenant_type_values()
    {
        return Tenant::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property'))
        ->groupBy('type')
        ->pluck('count');
    }

    public function get_delinquents()
    {
        return Bill::selectRaw('sum(bill-initial_payment) as balance, tenant_uuid')
        ->where('property_uuid', Session::get('property'))
        ->groupBy('tenant_uuid')
        ->get();
    }
    

    public function get_tenant_movein_values()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M')) as month_year"))
        ->orderBy('start')
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'active')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('count');
    }

    public function get_tenant_movein_labels()
    {
        return Contract::select(DB::raw("(count(*)) as count"), DB::raw("(DATE_FORMAT(start,
        '%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property'))
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
        ->where('property_uuid', Session::get('property'))
        ->where('status', 'inactive')
        ->orderBy('moveout_at')
        ->groupBy(DB::raw("DATE_FORMAT(month_year, '%m-%Y')"))
        ->limit(7)
        ->pluck('month_year');
    }

    public function get_reasons_for_moveout_values()
    {
        return Contract::select('moveout_reason')
        ->where('property_uuid', Session::get('property'))
        ->where('moveout_reason','!=', "NA")
        ->groupBy('moveout_reason')
        ->pluck('moveout_reason');
    }

    public function get_reasons_for_moveout_labels()
    {
        return Contract::select(DB::raw('count(*) as count'))
        ->where('property_uuid', Session::get('property'))
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    { 
        return view('properties.edit',[
            'property_details' => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $attributes = request()->validate([
        'property' => ['required', 'string', 'max:255'],
        'description' => ['nullable'],
        'type_id' => ['required', Rule::exists('types', 'id')],
        'thumbnail' => 'image',
        'status' => 'required',
        'tenant_contract' => 'nullable|mimes:pdf',
        'owner_contract' => 'nullable|mimes:pdf',
        ]);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if(isset($attributes['tenant_contract']))
        {
            $attributes['tenant_contract'] = request()->file('tenant_contract')->store('tenant_contracts');
        }
        
        if(isset($attributes['owner_contract']))
        {
        $attributes['owner_contract'] = request()->file('owner_contract')->store('owner_contracts');
        }

        $property_update($attributes);

        return back()->with('success', 'Property has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
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
}
