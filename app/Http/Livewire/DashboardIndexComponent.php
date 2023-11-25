<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Session;
use App\Models\Concern;

class DashboardIndexComponent extends Component
{
    public function render()
    {
        $allBuildings = app('App\Http\Controllers\Utilities\PropertyBuildingController')->get();

        $allContracts = app('App\Http\Controllers\Features\ContractController')->get();
        $activeContracts = app('App\Http\Controllers\Features\ContractController')->get('active');
        $pendingMoveoutContracts = app('App\Http\Controllers\Features\ContractController')->get('pendingmoveout');
        $pendingPaymentRequests = app('App\Http\Controllers\Utilities\PaymentRequestController')->get('pending');
        $expiringContracts = app('App\Http\Controllers\Features\ContractController')->getExpiringContracts();

        $allTenants = app('App\Http\Controllers\Features\TenantController')->get();
        $allVerifiedTenants = app('App\Http\Controllers\Features\TenantController')->getVerifiedTenants()->whereNotNull('email_verified_at');

        $allUnits = app('App\Http\Controllers\Features\UnitController')->get();
        $occupiedUnits = app('App\Http\Controllers\Features\UnitController')->get(2); //2 means occupied
        $vacantUnits = app('App\Http\Controllers\Features\UnitController')->get(1); //1 means vacant
        $reservedUnits = app('App\Http\Controllers\Features\UnitController')->get(4); //4 means reserved

        $allOwners = app('App\Http\Controllers\Features\OwnerController')->get();
        $allVerifiedOwners = app('App\Http\Controllers\Features\OwnerController')->getVerifiedOwners()->whereNotNull('email_verified_at');

        $allPersonnels = app('App\Http\Controllers\Features\PersonnelController')->get();
        $activePersonnels = app('App\Http\Controllers\Features\PersonnelController')->get(1);
        $verifiedPersonnels = app('App\Http\Controllers\Features\PersonnelController')->get();

        $occupancyPieChartValues = app('App\Http\Controllers\Features\UnitController')->getOccupancyPieChartValues();

        $occupancyPieChartLabels = json_encode($occupancyPieChartValues->pluck('status'));
        $occupancyPieChartValues = json_encode($occupancyPieChartValues->pluck('unit_count'));

        if($allUnits->count() > 0){
             $occupancyRate = number_format(($occupiedUnits->count()/$allUnits->count())*100,2).'%';
        }else{
             $occupancyRate = 100;
        }

        $allGuests = app('App\Http\Controllers\Features\GuestController')->get('checked-out');
        $averageNumberOfDaysGuestsStayed = app('App\Http\Controllers\Features\GuestController')->getAverageNumberOfDaysGuestsStayed();

        $postedCollections = app('App\Http\Controllers\Features\CollectionController')->get(1)->sum('collection');

        $completedRFPs =app('App\Http\Controllers\Features\RFPController')->get('completed')->sum('amount');

        $postedBills = app('App\Http\Controllers\Features\BillController')->get(1)->sum('bill');
        $postedPaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'paid')->sum('bill');
        $postedUnpaidBills =app('App\Http\Controllers\Features\BillController')->get(1, 'unpaid')->sum('bill');

        $billedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard();
        $uncollectedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard('unpaid');
        $collectedBillBarValues = app('App\Http\Controllers\Features\BillController')->getJsonEncodedBillForDashboard('paid');

        $collectionBar = app('App\Http\Controllers\Features\CollectionController')->getCollectionBar();
        $collectionBarLabels = json_encode($collectionBar->pluck('month_name'));
        $collectionBarValues = json_encode($collectionBar->pluck('total_collection'));

        $expenseBar = app('App\Http\Controllers\Features\RFPController')->getExpenseBar();
        $expenseBarLabels = json_encode($expenseBar->pluck('month_name'));
        $expenseBarValues = json_encode($expenseBar->pluck('total_expense'));

        if($postedUnpaidBills > 0){
            $collectionRate = number_format(($postedPaidBills/$postedBills)*100,2).'%';
        }else{
            $collectionRate = "NA";
        }

        $billPieChartValues = app('App\Http\Controllers\Features\UnitController')->getBillPieChartValues();

        $delinquentTenants =app('App\Http\Controllers\Features\BillController')->getDelinquentTenants();

        $waterConsumption = app('App\Http\Controllers\Features\UtilityController')->get('water',1)->sum('current_consumption');
        $electricConsumption =app('App\Http\Controllers\Features\UtilityController')->get('electric',1)->sum('current_consumption');

        $utilityWaterConsumptionChartLabels = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('water')->pluck('month_name');
        $utilityWaterConsumptionChartValues = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('water')->pluck('total_consumption');
        $utilityElectricConsumptionChartLabels = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('electric')->pluck('month_name');
        $utilityElectricConsumptionChartValues = app('App\Http\Controllers\Features\UtilityController')->getJsonEncodedUtilityForDashboard('electric')->pluck('total_consumption');

        $allConcerns =app('App\Http\Controllers\Features\ConcernController')->get();
        $closedConcerns =app('App\Http\Controllers\Features\ConcernController')->get('closed');
        $pendingConcerns =app('App\Http\Controllers\Features\ConcernController')->get('pending');
        $activeConcerns =app('App\Http\Controllers\Features\ConcernController')->get('active');


        $concernBar = Concern::select(DB::raw('monthname(created_at) as month_name, count(*) as total_concern'))
        ->where('property_uuid', Session::get('property_uuid'))
        // ->where('status', 'closed')
        ->groupBy(DB::raw('month(created_at)+"-"+year(created_at)'))
        ->limit(5);

        $concernBarLabels = json_encode($concernBar->pluck('month_name'));
        $concernBarValues = json_encode($concernBar->pluck('total_concern'));

        $approvedBulletins = app('App\Http\Controllers\Features\BulletinController')->get(1);

        $averageNumberOfDaysForConcernsToBeResolved = app('App\Http\Controllers\Features\ConcernController')->getAverageNumberOfDaysForConcernsToBeResolved();

        $concernPie = Concern::select(DB::raw('category, count(*) as total_concern'))
        ->join('concern_categories', 'concerns.category_id', 'concern_categories.id')
        ->where('property_uuid', Session::get('property_uuid'))
        ->groupBy('category')
        ->get();

        $concernPieLabels = $concernPie->pluck('category');
        $concernPieValues = $concernPie->pluck('total_concern');

        return view('livewire.features.dashboard.dashboard-index-component',compact(
           'allContracts',
           'activeContracts',
           'allTenants',
           'allVerifiedTenants' ,
           'allUnits',
           'occupiedUnits',
           'vacantUnits',
           'reservedUnits',
           'allOwners' ,
           'allVerifiedOwners',
           'allPersonnels',
           'activePersonnels',
           'verifiedPersonnels',
           'allBuildings' ,
           'occupancyPieChartLabels',
           'occupancyPieChartValues' ,
           'allGuests' ,
           'averageNumberOfDaysGuestsStayed',
           'postedCollections' ,
           'completedRFPs',
           'postedPaidBills',
           'postedUnpaidBills' ,
           'postedBills',
           'delinquentTenants',
           'waterConsumption',
           'electricConsumption',
           'allConcerns',
           'closedConcerns',
           'activeConcerns',
           'approvedBulletins',
           'occupancyRate',
           'collectionRate',
           'collectionBarLabels',
           'collectionBarValues',
            'expenseBarLabels',
            'expenseBarValues',
           'billedBillBarValues',
           'uncollectedBillBarValues',
           'collectedBillBarValues',
           'utilityWaterConsumptionChartLabels',
           'utilityWaterConsumptionChartValues',
           'utilityElectricConsumptionChartLabels',
           'utilityElectricConsumptionChartValues',
           'averageNumberOfDaysForConcernsToBeResolved',
           'expiringContracts',
           'pendingPaymentRequests',
           'pendingMoveoutContracts',
           'pendingConcerns',
           'concernBarLabels',
           'concernBarValues',
           'concernPieLabels',
           'concernPieValues')
        );
    }
}
