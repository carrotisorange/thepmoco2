<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\PropertyBuilding;
use App\Models\Owner;
use Session;

class PropertyShowComponent extends Component
{
    public function render()
    {
        // return view('layouts.under-construction-general');

        app('App\Http\Controllers\PropertyController')->store_property_session(Session::get('property_uuid'));

        app('App\Http\Controllers\PropertyController')->save_unit_stats(Session::get('property_uuid'));

        $contracts = app('App\Http\Controllers\ContractController')->getContracts(Session::get('property_uuid'));

        $concerns = app('App\Http\Controllers\ConcernController')->getConcerns(Session::get('property_uuid'));

        $units = app('App\Http\Controllers\UnitController')->getUnits(Session::get('property_uuid'));

        $tenants = app('App\Http\Controllers\TenantController')->getTenants(Session::get('property_uuid'));

        $collections = app('App\Http\Controllers\CollectionController')->getCollections(Session::get('property_uuid'));

        $expenses = app('App\Http\Controllers\RFPController')->getAccountPayables(Session::get('property_uuid'));

        $currentOccupancyRate  = app('App\Http\Controllers\PropertyController')->getOccupancyRate(Session::get('property_uuid'));

        $paymentRequests = app('App\Http\Controllers\PropertyController')->getOccupancyRate(Session::get('property_uuid'));

        $bills = app('App\Http\Controllers\BillController')->getBills(Session::get('property_uuid'));

        $delinquentTenants = app('App\Http\Controllers\PropertyController')->getDelinquents('tenant',Session::get('property_uuid'));

        $delinquentOwners = app('App\Http\Controllers\PropertyController')->getDelinquents('owner',Session::get('property_uuid'));

        $delinquentGuests = app('App\Http\Controllers\PropertyController')->getDelinquents('guest',Session::get('property_uuid'));

        $personnels = app('App\Http\Controllers\PersonnelController')->getPersonnels(Session::get('property_uuid'));

        $total_collected_bills = app('App\Http\Controllers\BillController')->get_property_bills(Session::get('property_uuid'),Carbon::now()->month,'paid');

        $total_uncollected_bills = app('App\Http\Controllers\BillController')->get_property_bills(Session::get('property_uuid'),Carbon::now()->month, 'unpaid');

        $collection_rate_date = app('App\Http\Controllers\PropertyController')->get_collection_rate_dates();

        $collection_rate_value = app('App\Http\Controllers\PropertyController')->get_collection_rate_values();

        $expense_rate_value = app('App\Http\Controllers\PropertyController')->get_expense_rate_values();

        $current_collection_rate = app('App\Http\Controllers\PropertyController')->get_current_collection_rate();

        $occupancy_rate_value = app('App\Http\Controllers\PropertyController')->get_occupancy_rate_values('this_year');

        $occupancy_rate_date = app('App\Http\Controllers\PropertyController')->get_occupancy_rate_dates('this_year');

        return view('livewire.property-show-component',[
            'contracts' => $contracts,
            'new_contracts_count' => app('App\Http\Controllers\ContractController')->get_contracts_trend_count(Session::get('property_uuid')),
            'new_contracts_date' => app('App\Http\Controllers\ContractController')->get_contracts_trend_date(Session::get('property_uuid')),
            'concerns' => $concerns,
            'units' => $units,
            'tenants' => $tenants,
            'collections' => $collections,
            'expenses' => $expenses,
            'currentOccupancyRate' => $currentOccupancyRate,
            'paymentRequests' => $paymentRequests,
            'bills' => $bills,
            'delinquentTenants' => $delinquentTenants,
            'delinquentOwners' => $delinquentOwners,
            'delinquentGuests' => $delinquentGuests,
            'personnels' => $personnels,
            'total_collected_bills' => $total_collected_bills,
            'total_uncollected_bills' => $total_uncollected_bills,
            'collection_rate_date' => $collection_rate_date,
            'collection_rate_value' => $collection_rate_value,
            'expense_rate_value' => $expense_rate_value,
            'current_collection_rate' => $current_collection_rate,
            'occupancy_rate_value' => $occupancy_rate_value,
            'occupancy_rate_date' => $occupancy_rate_date
        ]);
    }
}
