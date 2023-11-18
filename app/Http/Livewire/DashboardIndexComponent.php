<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\{Unit,Collection, Utility};
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

        $totalUnits = app('App\Http\Controllers\Features\UnitController')->get()->count();
        $totalOccupiedUnits = app('App\Http\Controllers\Features\UnitController')->get(2)->count();
        $totalVacantUnits = app('App\Http\Controllers\Features\UnitController')->get(1)->count();
        $totalReservedUnits = app('App\Http\Controllers\Features\UnitController')->get(4)->count();

        $totalOwners = app('App\Http\Controllers\Features\OwnerController')->get()->count();
        $totalVerifiedOwners = app('App\Http\Controllers\Features\OwnerController')->getVerifiedOwners()->whereNotNull('email_verified_at')->count();

        $totalPersonnels =app('App\Http\Controllers\Features\PersonnelController')->get()->count();
        $totalActivePersonnels =app('App\Http\Controllers\Features\PersonnelController')->get(1)->count();
        $totalVerifiedPersonnels =app('App\Http\Controllers\Features\PersonnelController')->get()->count();

        $occupancyPieChartValues = Unit::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('count(*) as unit_count, status'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('units.status_id')
        ->orderBy('status')
        ->limit(3);

        $occupancyPieChartLabels = json_encode($occupancyPieChartValues->pluck('status'));
        $occupancyPieChartValues = json_encode($occupancyPieChartValues->pluck('unit_count'));

        if($totalUnits > 0){
             $occupancyRate = number_format(($totalOccupiedUnits/$totalUnits)*100,2).'%';
        }else{
             $occupancyRate = 100;
        }

        $totalGuests = app('App\Http\Controllers\Features\GuestController')->get();
        $averageNumberOfDaysGuestsStayed = app('App\Http\Controllers\Features\GuestController')->averageNumberOfDaysGuestsStayed();

        $totalPostedCollections =app('App\Http\Controllers\Features\CollectionController')->get(1)->sum('collection');

        $totalCompletedRFPs =app('App\Http\Controllers\Features\RFPController')->get('completed')->sum('amount');

        $totalPostedBills =app('App\Http\Controllers\Features\BillController')->get(1)->sum('bill');
        $totalPostedPaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'paid')->sum('bill');
        $totalPostedUnpaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'unpaid')->sum('bill');

        $billedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard();
        $uncollectedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard('unpaid');
        $collectedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard('paid');

        // $incomeBarValues = Collection::select(DB::raw('monthname(collections.created_at) as collection_month_name, sum(collections.collection) as total_collection,
        // monthname(account_payables.created_at) as ap_month_name, sum(amount) as total_amount'))
        // ->leftJoin('account_payables', DB::raw('monthname(collections.created_at)'), DB::raw('monthname(account_payables.created_at)'))
        // ->where('collections.property_uuid', Session::get('property_uuid'))
        // ->groupBy('collection_month_name')
        // ->where('collections.is_posted',1)
        // ->where('account_payables.status', 'completed')
        // ->limit(5)
        // ->whereYear('collections.created_at', Carbon::now()->year)
        // ->orderBy(DB::raw('month(collections.created_at)'));

        $incomeBarValues = Collection::select(DB::raw('monthname(created_at) as month_name, sum(collection) as total_collection'))
        ->where('collections.property_uuid', Session::get('property_uuid'))
        ->groupBy(DB::raw('month(created_at)'))
        ->posted()
        ->limit(5)
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy(DB::raw('month(created_at)'));

        $incomeBarLabels = json_encode($incomeBarValues->pluck('month_name'));
        $collectionBarValues = json_encode($incomeBarValues->pluck('total_collection'));
        // ddd($collectionBarValues);
        // $expenseBarValues = json_encode($incomeBarValues->pluck('total_amount'));

        if($totalPostedUnpaidBills > 0){
            $collectionRate = number_format(($totalPostedPaidBills/$totalPostedUnpaidBills)*100,2).'%';
        }else{
            $collectionRate = "NA";
        }

        $billPieChartValues = Unit::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('count(*) as unit_count', 'status'))
        ->join('statuses', 'units.status_id', 'statuses.id')
        ->groupBy('units.status_id')
        ->orderBy('status')
        ->limit(3)
        ->pluck('unit_count');


        $delinquentTenants =app('App\Http\Controllers\Features\BillController')->getDelinquentTenants();

        $totalWaterConsumption = app('App\Http\Controllers\Features\UtilityController')->get('water',1)->sum('current_consumption');
        $totalElectricConsumption =app('App\Http\Controllers\Features\UtilityController')->get('electric',1)->sum('current_consumption');


        $utilityWaterConsumptionChartLabels = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('water')->pluck('month_name');
        $utilityWaterConsumptionChartValues = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('water')->pluck('total_consumption');
        $utilityElectricConsumptionChartLabels = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('electric')->pluck('month_name');
        $utilityElectricConsumptionChartValues = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('electric')->pluck('total_consumption');

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
           'totalReservedUnits',
           'totalOwners' ,
           'totalVerifiedOwners',
           'totalPersonnels',
           'totalActivePersonnels',
           'totalVerifiedPersonnels',
           'totalBuildings' ,
           'occupancyPieChartLabels',
           'occupancyPieChartValues' ,
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
           'totalApprovedBulletins',
           'occupancyRate',
           'collectionRate',
           'incomeBarLabels',
           'collectionBarValues',
        //    'expenseBarValues',
           'billedBillBarValues',
           'uncollectedBillBarValues',
           'collectedBillBarValues',
           'utilityWaterConsumptionChartLabels',
           'utilityWaterConsumptionChartValues',
           'utilityElectricConsumptionChartLabels',
           'utilityElectricConsumptionChartValues')
        );
    }
}
