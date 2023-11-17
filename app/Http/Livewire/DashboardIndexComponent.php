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
        $totalBuildings = app('App\Http\Controllers\Utilities\PropertyBuildingController')->getBuildings()->count();

        $totalContracts = app('App\Http\Controllers\Features\ContractController')->get()->count();
        $totalActiveGroupByTenantContracts = app('App\Http\Controllers\Features\ContractController')->get('active', 'tenant_uuid')->count();

        $totalTenants = app('App\Http\Controllers\Features\TenantController')->get()->count();
        $totalVerifiedTenants = app('App\Http\Controllers\Features\TenantController')->getVerifiedTenants()->whereNotNull('email_verified_at')->count();

        $totalUnits = app('App\Http\Controllers\Features\UnitController')->get();
        $totalOccupiedUnits = app('App\Http\Controllers\Features\UnitController')->get(2);
        $totalVacantUnits = app('App\Http\Controllers\Features\UnitController')->get(1);
        $totalMaintenanceUnits = app('App\Http\Controllers\Features\UnitController')->get(5);

        $totalOwners = app('App\Http\Controllers\Features\OwnerController')->get()->count();
        $totalVerifiedOwners = app('App\Http\Controllers\Features\OwnerController')->getVerifiedOwners()->whereNotNull('email_verified_at')->count();

        $totalPersonnels =app('App\Http\Controllers\Features\PersonnelController')->get()->count();
        $totalActivePersonnels =app('App\Http\Controllers\Features\PersonnelController')->get(1)->count();
        $totalVerifiedPersonnels =app('App\Http\Controllers\Features\PersonnelController')->get()->count();

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
        $totalGuests = app('App\Http\Controllers\Features\GuestController')->get();
        $averageNumberOfDaysGuestsStayed = app('App\Http\Controllers\Features\GuestController')->averageNumberOfDaysGuestsStayed();

        $totalPostedCollections =app('App\Http\Controllers\Features\CollectionController')->get(1)->sum('collection');

        $totalCompletedRFPs =app('App\Http\Controllers\Features\RFPController')->get('completed')->sum('amount');

        $totalPostedBills =app('App\Http\Controllers\Features\BillController')->get(1)->sum('bill');
        $totalPostedPaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'paid')->sum('bill');
        $totalPostedUnpaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'unpaid')->sum('bill');

        $delinquentTenants =app('App\Http\Controllers\Features\BillController')->getDelinquentTenants();

        $totalWaterConsumption =app('App\Http\Controllers\Features\UtilityController')->get('water',1)->sum('current_consumption');
        $totalElectricConsumption =app('App\Http\Controllers\Features\UtilityController')->get('electric',1)->sum('current_consumption');
        
        $totalConcerns =app('App\Http\Controllers\Features\ConcernController')->get()->count();
        $totalClosedConcerns =app('App\Http\Controllers\Features\ConcernController')->get('closed')->count();
        $totalActiveConcerns =app('App\Http\Controllers\Features\ConcernController')->get('active')->count();

        $totalApprovedBulletins =app('App\Http\Controllers\Features\BulletinController')->get(1)->count();

        return view('livewire.features.dashboard.dashboard-index-component',compact(
           'totalContracts',
           'totalActiveGroupByTenantContracts',
           'totalTenants',
           'totalVerifiedTenants' ,
           'totalUnits',
           'totalOccupiedUnits',
           'totalVacantUnits',
           'totalMaintenanceUnits',
           'totalOwners' ,
           'totalVerifiedOwners',
           'totalPersonnels',
           'totalActivePersonnels',
           'totalVerifiedPersonnels',
           'totalBuildings' ,
           'occupancyRateLabels',
           'occupancyRateValues' ,
           'totalGuests' ,
           'averageNumberOfDaysGuestsStayed',
           'totalPostedCollections' ,
           'totalCompletedRFPs',
           'totalPostedPaidBills',
           'totalPostedUnpaidBills' ,
           'totalPostedBills',
           'delinquentTenants',
           'totalWaterConsumption',
           'totalElectricConsumption',
           'totalConcerns',
           'totalClosedConcerns',
           'totalActiveConcerns',
           'totalApprovedBulletins')
        );
    }
}
