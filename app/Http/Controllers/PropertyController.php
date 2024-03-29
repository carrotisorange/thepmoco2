<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\{Property,Type,UserProperty,User,Bill,Contract,Tenant,AcknowledgementReceipt,Unit,UnitStats,Collection,AccountPayable,Role,Owner,Guest,Country,Province,City};

class PropertyController extends Controller
{
    public function index()
    {
        $this->destroy_property_session();

        $this->is_user_allowed_to_access(auth()->user()->status);

        return $this->redirectPageTo();
    }

    public function create($random_str)
    {
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

       public function redirectPageTo(){

        $current_user_role_id = auth()->user()->role_id;

        $current_user_username = auth()->user()->username;

        $sales = '12';

        $dev = '10';

        $tenant = '8';

        $owner = '7';

        if($current_user_role_id == $sales)
        {
            return redirect($current_user_role_id.'/sale/'.$current_user_username.'/signup');
        }
        elseif($current_user_role_id == $dev)
        {
            return redirect('/dashboard/dev');
        }
        elseif($current_user_role_id == $tenant)
        {
            return redirect($current_user_role_id.'/tenant/'.$current_user_username.'/bulletin');
        }
        elseif($current_user_role_id == $owner)
        {
            return redirect($current_user_role_id.'/owner/'.$current_user_username.'/bulletin');
        }
        elseif($current_user_role_id != ['12', '10', '8', '7'])
        {
            return view('properties.index');
        }
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

    public function getOccupancyRate($property_uuid)
    {
        return UnitStats::select(DB::raw('(occupied/total)*100 as occupancy_rate'),
        DB::raw('MAX(occupied)'), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', $property_uuid)
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->get()
        ->last();
    }

    public function get_collection_rate_dates()
    {
        return Collection::select(DB::raw("(sum(collection)) as total_amount"), DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->where('property_uuid', Session::get('property_uuid'))
        ->posted()
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
         ->whereYear('created_at', Carbon::now()->format('Y'))
        ->pluck('month_year');
    }

    public function get_collection_rate_values()
    {
        return Collection::select(DB::raw("(sum(collection)) as total_amount"),
        DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
        ->posted()
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
          ->whereYear('created_at', Carbon::now()->format('Y'))
        ->pluck('total_amount');
    }

    public function get_expense_rate_values()
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

        if(Bill::where('property_uuid', Session::get('property_uuid'))->posted()->sum('bill') > 0)
        {
            $current_collection_rate = Collection::select(DB::raw("(sum(collection)) as total_amount"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
            ->where('property_uuid', Session::get('property_uuid'))
            ->orderBy('created_at')
            ->posted()
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->pluck('total_amount')
            ->last() / Bill::select(DB::raw("(sum(bill)) as total_bill"), DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year"))
             ->posted()
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

    public function getDelinquents($user_type, $property_uuid)
    {
        $delinquents = array();

        if($user_type == 'tenant'){

            $tenants = Tenant::where('property_uuid',$property_uuid)->get();

            foreach($tenants as $tenant){

            $balance = Bill::where('tenant_uuid', $tenant->uuid)->posted()->sum('bill') - Collection::where('tenant_uuid', $tenant->uuid)->posted()->sum('collection');

            if($balance > 0){
                $delinquents[] = [
                    'balance' => $balance,
                    'tenant' => $tenant->tenant,
                    'tenant_uuid' => $tenant->uuid,
                ];
            }

        }

        }elseif($user_type == 'owner'){

            $owners = Owner::where('property_uuid', $property_uuid)->get();

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

        }else{

            $guests = Guest::where('property_uuid', $property_uuid)->get();

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

        }

        return $delinquents;
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

    public function updateNoteToBill($note)
    {
        return Property::where('uuid',Session::get('property_uuid'))->update([
            'note_to_bill' => $note,
        ]);
    }

    public function success(Property $property)
    {
        return view('properties.success', [
            'property' => $property
        ]);
    }

    public function congratulations(Property $property)
    {
        return view('properties.congratulations', [
            'property' => $property
        ]);
    }

    public function storeUnitStatistics()
    {
        UnitStats::firstOrCreate([
            'total' =>  Unit::where('property_uuid',Session::get('property_uuid'))->count(),
            'vacant' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',1)->count(),
            'occupied' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',2)->count(),
            'dirty' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',3)->count(),
            'reserved' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',4)->count(),
            'under_maintenance' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',5)->count(),
            'pending' => Unit::where('property_uuid',Session::get('property_uuid'))->where('status_id',6)->count(),
            'property_uuid' => Session::get('property_uuid')
        ]);

    }

    public function edit(Property $property)
    {
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

    public function destroy_property_session()
    {
        Session::forget('property');
        Session::forget('property_name');
        Session::forget('role');
        Session::forget('role_id');
        Session::forget('is_approved');
        Session::forget('is_account_owner');

    }

    public function storePropertySession($property_uuid)
    {
        Session::put('property_uuid', Property::find($property_uuid)->uuid);

        Session::put('property', Property::find($property_uuid)->property);

        Session::put('property_address', $this->get_property_address($property_uuid));

        Session::put('property_registered_tin', Property::find($property_uuid)->registered_tin);

        Session::put('role', Role::find(UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('role_id')->first())->role);

        Session::put('role_id', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('role_id')->first());

        Session::put('is_approved', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('is_approved')->first());

        Session::put('is_account_owner', UserProperty::where('property_uuid', $property_uuid)->where('user_id', auth()->user()->id)->pluck('is_account_owner')->first());

        Session::put('property_email', Property::find($property_uuid)->email);

        Session::put('property_type', Property::find($property_uuid)->type->type);

        Session::put('property_type_id', Property::find($property_uuid)->type->id);

        $property_type_id = Property::find($property_uuid)->type->id;

        Session::put('property_unit_type_id', Type::find($property_type_id)->unit_type_id);

        Session::put('property_mobile', Property::find($property_uuid)->mobile);

        Session::put('property_facebook_page', Property::find($property_uuid)->facebook_page);

        Session::put('property_remarks', Property::find($property_uuid)->remarks);

        Session::put('property_thumbnail', Property::find($property_uuid)->thumbnail);

        Session::put('property_management_fee_long_term', Property::find($property_uuid)->management_fee_long_term);

        Session::put('property_management_fee_short_term', Property::find($property_uuid)->management_fee_short_term);

        Session::put('property_management_fee_transient', Property::find($property_uuid)->management_fee_transient);

        Session::put('property_note_to_bill', Property::find($property_uuid)->note_to_bill);

        app('App\Http\Controllers\Utilities\UserRestrictionController')->storeOrUpdateFeatureRestrictions($property_uuid);

    }

    public function getManagementFee($rent, $description){

        $managementFee = 0;

        if($description == 'long_term'){
            $managementFee= $rent * (Session::get('property_management_fee_long_term')/100);
        }elseif($description == 'short_term'){
            $managementFee= $rent * (Session::get('property_management_fee_short_term')/100);
        }else{
            $managementFee= $rent * (Session::get('property_management_fee_transient')/100);
        }

        return $managementFee;

    }

    public function get_property_address($property_uuid){

        $country = Country::where('id',(Property::where('uuid', $property_uuid)->pluck('country_id')->first()))->pluck('country')->first();

        $province = Province::where('id',(Property::where('uuid', $property_uuid)->pluck('province_id')->first()))->pluck('province')->first();

        $city = City::where('id',(Property::where('uuid', $property_uuid)->pluck('city_id')->first()))->pluck('city')->first();

        $barangay = Property::where('uuid', $property_uuid)->pluck('barangay')->first();

        $address = $country.', '.$province.', '.$city.', '.$barangay;

        return $address;
    }

    public function unlock($property_uuid)
    {
        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens',20);

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

    public function getPersonnelProperties($search, $sortBy, $filterByPropertyType, $limitDisplayTo)
    {
        return UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->join('types', 'type_id', 'types.id')
        ->where('user_id', auth()->user()->id)
        ->where('user_properties.is_approved',1)
        ->when($search, function($query, $search){
        $query->where('property','like', '%'.$search.'%');
        })
            ->when($sortBy, function($query, $sortBy){
        $query->orderBy('properties.'.$sortBy, 'desc');
        })
            ->when($filterByPropertyType, function($query, $filterByPropertyType){
         $query->where('type_id',$filterByPropertyType);
        })->get();
    }

}
