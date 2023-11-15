<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\{Unit,Booking};
use DB;

class DashboardIndexComponent extends Component
{
    public function render()
    {
        $buildings = app('App\Http\Controllers\Utilities\PropertyBuildingController')->getBuildings();

        $contracts = app('App\Http\Controllers\Features\ContractController')->getContracts();

        $tenants = app('App\Http\Controllers\Features\TenantController')->getTenants();

        $verifiedTenants = app('App\Http\Controllers\Features\TenantController')->getVerifiedTenants();

        $units =app('App\Http\Controllers\Features\UnitController')->getUnits();

        $owners =app('App\Http\Controllers\Features\OwnerController')->getOwners();

        $verifiedOwners = app('App\Http\Controllers\Features\OwnerController')->getVerifiedOwners();

        $personnels =app('App\Http\Controllers\Features\PersonnelController')->getPersonnels();

        $verifiedPersonnels =app('App\Http\Controllers\Features\PersonnelController')->getVerifiedPersonnels();

        $occupancyRateLabels = Unit::where('property_uuid', Session::get('property_uuid'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('status_id')
        ->orderBy('status')
        ->pluck('status');

        $occupancyRateLabels = join('", "', $occupancyRateLabels->toArray());

        $occupancyRateValues = Unit::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('count(*) as unit_count', 'status'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('units.status_id')
        ->orderBy('status')
        ->pluck('unit_count');

        $occupancyRateValues = join('", "', $occupancyRateValues->toArray());

        $guests =app('App\Http\Controllers\Features\GuestController')->getGuests();

        $averageNumberOfDaysStayed = Booking::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('avg(DATEDIFF(moveout_at,movein_at)) as average_days_stayed, count(*) as guest_count'))
        ->where('property_uuid', Session::get('property_uuid'))
        ->value('average_days_stayed');

        // $concerns = app('App\Http\Controllers\Features\ConcernController')->getConcerns(Session::get('property_uuid'));

        // $collections = app('App\Http\Controllers\Features\CollectionController')->getCollections(Session::get('property_uuid'));

        // $expenses = app('App\Http\Controllers\Features\RFPController')->getAccountPayables(Session::get('property_uuid'));

        // $currentOccupancyRate  = app('App\Http\Controllers\PropertyController')->getOccupancyRate(Session::get('property_uuid'));

        // $paymentRequests = app('App\Http\Controllers\PropertyController')->getOccupancyRate(Session::get('property_uuid'));

        // $bills = app('App\Http\Controllers\Features\BillController')->getBills(Session::get('property_uuid'));

        // $delinquentTenants = app('App\Http\Controllers\PropertyController')->getDelinquents('tenant',Session::get('property_uuid'));

        // $delinquentOwners = app('App\Http\Controllers\PropertyController')->getDelinquents('owner',Session::get('property_uuid'));

        // $delinquentGuests = app('App\Http\Controllers\PropertyController')->getDelinquents('guest',Session::get('property_uuid'));

        // $total_collected_bills = app('App\Http\Controllers\Features\BillController')->get_property_bills(Session::get('property_uuid'),Carbon::now()->month,'paid');

        // $total_uncollected_bills = app('App\Http\Controllers\Features\BillController')->get_property_bills(Session::get('property_uuid'),Carbon::now()->month, 'unpaid');

        // $collection_rate_date = app('App\Http\Controllers\PropertyController')->get_collection_rate_dates();

        // $collection_rate_value = app('App\Http\Controllers\PropertyController')->get_collection_rate_values();

        // $expense_rate_value = app('App\Http\Controllers\PropertyController')->get_expense_rate_values();

        // $current_collection_rate = app('App\Http\Controllers\PropertyController')->get_current_collection_rate();

        // $occupancy_rate_value = app('App\Http\Controllers\PropertyController')->get_occupancy_rate_values('this_year');

        // $occupancy_rate_date = app('App\Http\Controllers\PropertyController')->get_occupancy_rate_dates('this_year');

        return view('livewire.features.dashboard.dashboard-index-component',[
            'contracts' => $contracts,
            'tenants' => $tenants,
            'verifiedTenants' => $verifiedTenants,
            'units' => $units,
            'owners' => $owners,
            'personnels' => $personnels,
            'verifiedPersonnels' => $verifiedPersonnels,
            'buildings' => $buildings,
            'occupancyRateLabels' => $occupancyRateLabels,
            'occupancyRateValues' => $occupancyRateValues,
            'guests' => $guests,
            'averageNumberOfDaysStayed' => $averageNumberOfDaysStayed,
            'verifiedOwners' => $verifiedOwners
        ]);
    }
}
