<?php

namespace App\Http\Livewire;

use App\Models\AccountPayableLiquidation;
use App\Models\AccountPayableLiquidationParticular;
use App\Models\AccountPayableParticular;
use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;
use Session;
use App\Models\Utility;
use App\Models\Concern;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\UnitInventory;
use App\Models\Collection;
use App\Models\Remittance;


class UnitShowComponent extends Component
{
    public $property;
    
    public $unit_details;
    //unit input fields
    public $unit;
    public $building_id;
    public $floor_id;
    public $category_id;
    public $status_id;
    public $size;
    public $rent;
    public $discount;
    public $occupancy;
    public $is_the_unit_for_rent_to_tenant;
    public $price;
    public $rent_type;
    public $transient_rent;
    public $transient_discount;
    public $rent_duration;
    public $marketing_fee;
    public $management_fee;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public $isIndividualView = true;

    public $unit_uuid;

    public $user_type = 'unit';

    public function mount($unit_details)
    {
        $this->unit = $unit_details->unit;
        $this->building_id = $unit_details->building_id;
        $this->floor_id = $unit_details->floor_id;
        $this->category_id = $unit_details->category_id;
        $this->status_id = $unit_details->status_id;
        $this->size = $unit_details->size;
        $this->rent = $unit_details->rent;
        $this->discount = $unit_details->discount;
        $this->occupancy = $unit_details->occupancy;
        $this->is_the_unit_for_rent_to_tenant = $unit_details->is_the_unit_for_rent_to_tenant;
        $this->price = $unit_details->price;
        $this->rent_type = $unit_details->rent_type;
        $this->transient_rent = $unit_details->transient_rent;
        $this->transient_discount = $unit_details->transient_discount;
        $this->rent_duration = $unit_details->rent_duration;
        $this->management_fee = $unit_details->management_fee;
        $this->marketing_fee = $unit_details->marketing_fee;
        $this->unit_uuid = $unit_details->uuid;
    }
    
    protected function rules()
    {
        return [
            'unit' => ['required', 'string', 'max:255'],
            'building_id' => [Rule::exists('property_buildings', 'id')],
            'floor_id' => ['required', Rule::exists('floors', 'id')],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'size' => 'required',
            
            'occupancy' => 'required',
            'is_the_unit_for_rent_to_tenant' => 'required',
            'price' => 'nullable',
            'rent_type' => ['required_if:is_the_unit_for_rent_to_tenant,1'],
            'rent_duration' => ['required_if:is_the_unit_for_rent_to_tenant,1'],
            'transient_rent' => ['required_if:rent_duration,transient'],
            'transient_discount' => ['required_if:rent_duration,transient'],
            'rent' => ['required_if:rent_duration,long_term'],
            'discount' => ['required_if:rent_duration,long_term'],
            'management_fee' => ['required'],
            'marketing_fee' => ['required']
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function redirectToTheCreateUnitInventoryPage(){
        

        return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit_details->uuid.'/inventory/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateOwnerPage(){
        
        

        return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit_details->uuid.'/owner/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateTenantPage(){
        
        

        return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit_details->uuid.'/tenant/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateGuestPage(){
        
        

        return redirect('/property/'.$this->property->uuid.'/calendar');
    }

    public function redirectToTheCreateUtilitiesPage(){
        
        

        return redirect('/property/'.$this->property->uuid.'/utilities/');
    }

    public function redirectToTheCreateConcernPage(){
        
        

        return redirect('/property/'.Session::get('property').'/unit/'.$this->unit_details->uuid.'/concern/'.Str::random(8).'/create');
    }
    
    public function submitForm()
    {
        
       
        $validatedData = $this->validate();
         
        try{

            DB::beginTransaction();
        
            $this->unit_details->update($validatedData);

            DB::commit();

            app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'updates',2);

            session()->flash('success', 'Success!');
                    
        }catch(\Exception $e){

            session()->flash('error');
        }
    }

    public function deleteUnit(){
        app('App\Http\Controllers\PropertyContractController')->destroy($this->unit_details->uuid,null);
        app('App\Http\Controllers\PropertyDeedOfSaleController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyUtilityController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyGuestController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyConcernController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyBillController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyUnitController')->destroy($this->unit_details->uuid);
        Collection::where('unit_uuid', $this->unit_details->uuid)->delete();
        UnitInventory::where('unit_uuid', $this->unit_details->uuid)->delete();
        AccountPayableLiquidation::where('unit_uuid', $this->unit_details->uuid)->delete();
        AccountPayableLiquidationParticular::where('unit_uuid', $this->unit_details->uuid)->delete();
        AccountPayableParticular::where('unit_uuid', $this->unit_details->uuid)->delete();
        Remittance::where('unit_uuid', $this->unit_details->uuid)->delete();

        return redirect('/property/'.$this->unit_details->property_uuid.'/unit/')->with('success', 'Success!');
    }

    public function closeModal(){
        
        return redirect('/property/'.$this->unit_details->property_uuid.'/unit/'.$this->unit_details->uuid);
    }

    public function render()
    {
            $utilities = Utility::posted()
              ->select('*', 'units.unit as unit_name' )
              ->join('units', 'utilities.unit_uuid', 'units.uuid')
              ->where('utilities.property_uuid', $this->unit_details->property_uuid)
              ->where('utilities.unit_uuid', $this->unit_details->uuid)
              ->orderBy('start_date', 'desc')
              ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
              ->get();

            $revenues = DB::table('collections')
            ->select(DB::raw("SUM(collections.collection) as amount"), 'particulars.particular as particular')
            ->join('bills','collections.bill_id', 'bills.id')
            ->join('particulars', 'bills.particular_id', 'particulars.id')
            ->where('collections.property_uuid', $this->unit_details->property_uuid)
            ->where('collections.unit_uuid', $this->unit_details->uuid)
            ->whereYear('collections.updated_at', Carbon::now()->format('Y'))
            ->groupBy('bills.particular_id')
            ->orderBy('amount', 'desc')
            ->get();

            $expenses = DB::table('account_payable_liquidations')
            ->select(DB::raw("SUM(account_payable_liquidation_particulars.total) as amount"), 'account_payable_liquidation_particulars.item as particular')
            ->join('account_payable_liquidation_particulars','account_payable_liquidations.batch_no', 'account_payable_liquidation_particulars.batch_no')
            ->join('account_payables','account_payable_liquidations.batch_no', 'account_payables.batch_no')
            ->where('account_payables.property_uuid', $this->unit_details->property_uuid)
            ->where('account_payable_liquidation_particulars.unit_uuid', $this->unit_details->uuid)
            ->whereYear('account_payable_liquidations.created_at', Carbon::now()->format('Y'))
            ->whereNotNull('account_payable_liquidations.approved_by')
            ->groupBy('account_payable_liquidation_particulars.item')
            ->orderBy('amount', 'desc')
            ->get();

        return view('livewire.unit-show-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index($this->unit_details->property_uuid),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
            'bookings' => app('App\Http\Controllers\GuestController')->show_unit_guests($this->unit_details->uuid),
            'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($this->unit_details->uuid),
            'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($this->unit_details->uuid),
            'contracts' => app('App\Http\Controllers\ContractController')->show_unit_contracts($this->unit_details->uuid),
            'total_collected_bills' => app('App\Http\Controllers\BillController')->get_unit_bills($this->unit_details->uuid,null,'paid'),
            'total_uncollected_bills' => app('App\Http\Controllers\BillController')->get_unit_bills($this->unit_details->uuid ,null,'unpaid'),
            'utilities' => $utilities,
            'concerns' => Concern::where('unit_uuid', $this->unit_details->uuid)->get(),
            'inventories' => UnitInventory::where('unit_uuid', $this->unit_details->uuid)->where('contract_uuid', '')->get(),
            'collections' => app('App\Http\Controllers\UnitController')->get_unit_collections($this->unit_details->property_uuid, $this->unit_details->uuid),
            'revenues' => $revenues,
            'expenses' => $expenses,
            'remittances' => Remittance::where('unit_uuid', $this->unit_details->uuid)->get()
        ]);
    }
}
