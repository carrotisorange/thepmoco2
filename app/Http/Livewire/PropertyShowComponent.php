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

            // 'pending_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns(Session::get('property_uuid'),'pending', ''),
            // 'closed_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns(Session::get('property_uuid'), 'closed', Carbon::now()->month),
            // 'payment_requests' => app('App\Http\Controllers\CollectionController')->get_property_payment_requests(Session::get('property_uuid'), 'pending'),
            // 'roles' => app('App\Http\Controllers\RoleController')->get_property_user_roles(Session::get('property_uuid')),
            // 'daily_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections(Session::get('property_uuid'), Carbon::today(), Carbon::now()->month)->sum('collection'),
            // 'current_monthly_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections(Session::get('property_uuid'),'',Carbon::now()->month)->sum('collection'),
            // 'previous_monthly_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections(Session::get('property_uuid'),'', Carbon::now()->subMonth()->month)->sum('collection'),

            // 'current_monthly_moveouts' => app('App\Http\Controllers\ContractController')->get_property_moveouts(Session::get('property_uuid'),'', Carbon::now()->month)->count(),
            // 'current_monthly_expenses' => app('App\Http\Controllers\RequestForPurchaseController')->get_property_expenses(Session::get('property_uuid'),'', Carbon::now()->month)->sum('amount'),
            // 'previous_monthly_expenses' => app('App\Http\Controllers\RequestForPurchaseController')->get_property_expenses(Session::get('property_uuid'),'', Carbon::now()->subMonth(1)->month)->sum('amount'),
            // 'tenants' => app('App\Http\Controllers\TenantController')->get_property_tenants(Session::get('property_uuid') ,''),
            // 'units' => app('App\Http\Controllers\UnitController')->getUnits(Session::get('property_uuid'), '','', ''),
            // 'occupied_units' => app('App\Http\Controllers\UnitController')->getUnits(Session::get('property_uuid'), 2, '', ''),
            // 'vacant_units' => app('App\Http\Controllers\UnitController')->getUnits(Session::get('property_uuid'), 1,'', ''),
            // 'unlisted_units' => app('App\Http\Controllers\UnitController')->getUnits(Session::get('property_uuid'), 1,'', 0),


            // 'occupancy_rate_value' => app('App\Http\Controllers\PropertyController')->get_occupancy_rate_values($this->occupancyGraphValue),
            // 'occupancy_rate_date' => app('App\Http\Controllers\PropertyController')->get_occupancy_rate_dates($this->occupancyGraphValue),

            // 'collection_rate_date' => app('App\Http\Controllers\PropertyController')->get_collection_rate_dates($this->collectionLineValue),
            // 'collection_rate_value' => app('App\Http\Controllers\PropertyController')->get_collection_rate_values($this->collectionLineValue),
            // 'expense_rate_value' => app('App\Http\Controllers\PropertyController')->get_expense_rate_values($this->collectionLineValue),
            // 'current_collection_rate' => app('App\Http\Controllers\PropertyController')->get_current_collection_rate(),
            // 'bill_rate_value' => app('App\Http\Controllers\PropertyController')->get_bill_rate_values(),
            // 'tenant_type_label' => app('App\Http\Controllers\PropertyController')->get_tenant_type_labels(),
            // 'tenant_type_value' => app('App\Http\Controllers\PropertyController')->get_tenant_type_values(),
            // 'tenant_movein_value' => app('App\Http\Controllers\PropertyController')->get_tenant_movein_values(),
            // 'tenant_movein_label' => app('App\Http\Controllers\PropertyController')->get_tenant_movein_labels(),
            // 'tenant_moveout_value' => app('App\Http\Controllers\PropertyController')->get_tenant_moveout_values(),
            // 'reasons_for_moveout_label' => app('App\Http\Controllers\PropertyController')->get_reasons_for_moveout_labels(),
            // 'reasons_for_moveout_value' => app('App\Http\Controllers\PropertyController')->get_reasons_for_moveout_values(),
            // 'delinquent_tenants' => app('App\Http\Controllers\PropertyController')->get_delinquents('tenant'),
            // 'delinquent_guests' => app('App\Http\Controllers\PropertyController')->get_delinquents('guest'),
            // 'delinquent_owners' => app('App\Http\Controllers\PropertyController')->get_delinquents('owner'),
            // 'owners' => Owner::where('property_uuid', Session::get('property_uuid')),
            // 'buildings' => PropertyBuilding::where('property_uuid', Session::get('property_uuid'))->count(),
            // 'personnels' => app('App\Http\Controllers\UserPropertyController')->getPersonnels(Session::get('property_uuid')),
        ]);
    }
}
