<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\PropertyBuilding;
use App\Models\Owner;

class PropertyDashboardComponent extends Component
{
    public $property;

    public $occupancyGraphValue = 'this_year';
    public $collectionLineValue = 'this_year';

    public function render()
    {
        app('App\Http\Controllers\PropertyController')->store_property_session($this->property->uuid);

        app('App\Http\Controllers\ActivityController')->store($this->property->uuid, auth()->user()->id,'opens',1);

        app('App\Http\Controllers\PropertyController')->save_unit_stats($this->property->uuid);

        return view('livewire.property-dashboard-component',[
            //'contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, '','', '', ''),
            'expired_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, 'inactive', '', '',''),
            'contracts' =>app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, 'active', Carbon::now()->addMonth(), '', ''),
            'pending_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, 'pendingmoveout','', '', ''),
            'movingin_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, '', '',Carbon::now()->month, ''),
            'movingout_contracts' => app('App\Http\Controllers\ContractController')->get_property_contracts($this->property->uuid, '', '', '',Carbon::now()->month),
            'new_contracts_count' => app('App\Http\Controllers\ContractController')->get_contracts_trend_count($this->property->uuid),
            'new_contracts_date' => app('App\Http\Controllers\ContractController')->get_contracts_trend_date($this->property->uuid),
            'concerns' =>app('App\Http\Controllers\ConcernController')->get_property_concerns($this->property->uuid, '', Carbon::now()->month),
            'pending_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns($this->property->uuid,'pendingmovein', ''),
            'closed_concerns' => app('App\Http\Controllers\ConcernController')->get_property_concerns($this->property->uuid, 'closed', Carbon::now()->month),
            'payment_requests' => app('App\Http\Controllers\PaymentRequestController')->get_property_payment_requests($this->property->uuid, 'pending'),
            'roles' => app('App\Http\Controllers\PropertyRoleController')->get_property_user_roles($this->property->uuid),
            'daily_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections($this->property->uuid, Carbon::today(), Carbon::now()->month)->sum('collection'),
            'current_monthly_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections($this->property->uuid,'',Carbon::now()->month)->sum('collection'),
            'previous_monthly_collections' => app('App\Http\Controllers\CollectionController')->get_property_collections($this->property->uuid,'', Carbon::now()->subMonth()->month)->sum('collection'),
            'current_monthly_moveins' => app('App\Http\Controllers\ContractController')->get_property_moveins($this->property->uuid,'', Carbon::now()->month)->count(),
            'current_monthly_moveouts' => app('App\Http\Controllers\ContractController')->get_property_moveouts($this->property->uuid,'', Carbon::now()->month)->count(),
            'current_monthly_expenses' => app('App\Http\Controllers\AccountPayableController')->get_property_expenses($this->property->uuid,'', Carbon::now()->month)->sum('amount'),
            'previous_monthly_expenses' => app('App\Http\Controllers\AccountPayableController')->get_property_expenses($this->property->uuid,'', Carbon::now()->subMonth(1)->month)->sum('amount'),
            'tenants' => app('App\Http\Controllers\TenantController')->get_property_tenants($this->property->uuid ,''),
            'units' => app('App\Http\Controllers\UnitController')->get_property_units($this->property->uuid, '','', ''),
            'occupied_units' => app('App\Http\Controllers\UnitController')->get_property_units($this->property->uuid, 2, '', ''),
            'vacant_units' => app('App\Http\Controllers\UnitController')->get_property_units($this->property->uuid, 1,'', ''),
            'unlisted_units' => app('App\Http\Controllers\UnitController')->get_property_units($this->property->uuid, 1,'', 0),
            'notifications' => app('App\Http\Controllers\NotificationController')->get_property_notifications($this->property->uuid),
            //'monthly_bills' => app('App\Http\Controllers\BillController')->get_property_bills($this->property->uuid, Carbon::now()->month()),
            //'total_acknowledgement_receipts' => app('App\Http\Controllers\AcknowledgementReceiptController')->get_property_acknowledgementreceipts($this->property->uuid, Carbon::now()->month()), 
            'total_collected_bills' => app('App\Http\Controllers\BillController')->get_property_bills($this->property->uuid,Carbon::now()->month,'paid'),
            'total_uncollected_bills' => app('App\Http\Controllers\BillController')->get_property_bills($this->property->uuid,Carbon::now()->month, 'unpaid'),
            'occupancy_rate_value' => app('App\Http\Controllers\PropertyController')->get_occupancy_rate_values($this->occupancyGraphValue),
            'occupancy_rate_date' => app('App\Http\Controllers\PropertyController')->get_occupancy_rate_dates($this->occupancyGraphValue),
            'current_occupancy_rate' => app('App\Http\Controllers\PropertyController')->get_current_occupancy_rate($this->property->uuid),
            'collection_rate_date' => app('App\Http\Controllers\PropertyController')->get_collection_rate_dates($this->collectionLineValue),
            'collection_rate_value' => app('App\Http\Controllers\PropertyController')->get_collection_rate_values($this->collectionLineValue),
            'expense_rate_value' => app('App\Http\Controllers\PropertyController')->get_expense_rate_values($this->collectionLineValue),
            'current_collection_rate' => app('App\Http\Controllers\PropertyController')->get_current_collection_rate(),
            'bill_rate_value' => app('App\Http\Controllers\PropertyController')->get_bill_rate_values(),
            'tenant_type_label' => app('App\Http\Controllers\PropertyController')->get_tenant_type_labels(),
            'tenant_type_value' => app('App\Http\Controllers\PropertyController')->get_tenant_type_values(),
            'tenant_movein_value' => app('App\Http\Controllers\PropertyController')->get_tenant_movein_values(),
            'tenant_movein_label' => app('App\Http\Controllers\PropertyController')->get_tenant_movein_labels(),
            'tenant_moveout_value' => app('App\Http\Controllers\PropertyController')->get_tenant_moveout_values(),
            'reasons_for_moveout_label' => app('App\Http\Controllers\PropertyController')->get_reasons_for_moveout_labels(),
            'reasons_for_moveout_value' => app('App\Http\Controllers\PropertyController')->get_reasons_for_moveout_values(),
            'delinquents' => app('App\Http\Controllers\PropertyController')->get_delinquents(),
            'owners' => Owner::where('property_uuid', $this->property->uuid),
            'buildings' => PropertyBuilding::where('property_uuid', $this->property->uuid)->count(),
            'employees' => app('App\Http\Controllers\UserPropertyController')->get_property_users($this->property->uuid),
        ]);
    }
}
