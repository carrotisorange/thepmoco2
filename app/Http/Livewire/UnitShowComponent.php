<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;
use Session;
use App\Models\Utility;
use App\Models\Concern;
use App\Models\DeedOfSale;
use Illuminate\Support\Str;
use App\Models\UnitInventory;
use App\Models\Guest;
use App\Models\Contract;
use App\Models\Bill;
use App\Models\Unit;

class UnitShowComponent extends Component
{
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
    public $property_uuid;
    public $rent_type;

    public $view = 'listView';

    public $isPaymentAllowed = false;

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
        $this->property_uuid = Session::get('property');
        $this->rent_type = $unit_details->rent_type;
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
            'rent' => 'required',
            'discount' => 'required',
            'occupancy' => 'required',
            'is_the_unit_for_rent_to_tenant' => 'required',
            'price' => 'nullable',
            'rent_type' => 'required'
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function redirectToTheCreateUnitInventoryPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/unit/'.$this->unit_details->uuid.'/inventory/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateOwnerPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/unit/'.$this->unit_details->uuid.'/owner/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateTenantPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/unit/'.$this->unit_details->uuid.'/tenant/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateGuestPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/unit/'.$this->unit_details->uuid.'/guest/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateUtilitiesPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/utilities/');
    }

    public function redirectToTheCreateConcernPage(){
        
        sleep(2);

        return redirect('/property/'.$this->property_uuid.'/unit/'.$this->unit_details->uuid.'/concern/'.Str::random(8).'/create');
    }
    
    public function submitForm()
    {
        sleep(2);
       
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

        sleep(3);

        app('App\Http\Controllers\PropertyContractController')->destroy($this->unit_details->uuid,null);
        app('App\Http\Controllers\PropertyDeedOfSaleController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyUtilityController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyGuestController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyConcernController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyBillController')->destroy($this->unit_details->uuid);
        app('App\Http\Controllers\PropertyUnitController')->destroy($this->unit_details->uuid);

        return redirect('/property/'.$this->unit_details->property_uuid.'/unit/')->with('success', 'Success!');
    }

     public function exportUnitInventory(){
        sleep(2);

        return redirect('/property/'.$this->unit_details->property_uuid.'/unit/'.$this->unit_details->uuid.'/inventory/export');
    }

    public function closeModal(){
        
        return redirect('/property/'.$this->unit_details->property_uuid.'/unit/'.$this->unit_details->uuid);
    }

    public function render()
    {
              $utilities = Utility::isposted()
              ->select('*', 'units.unit as unit_name' )
              ->join('units', 'utilities.unit_uuid', 'units.uuid')
              ->where('utilities.property_uuid', $this->unit_details->property_uuid)
              ->where('utilities.unit_uuid', $this->unit_details->uuid)
              ->orderBy('start_date', 'desc')
              ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
              ->get();

        return view('livewire.unit-show-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index($this->property_uuid),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
            'guests' => app('App\Http\Controllers\GuestController')->show_unit_guests($this->unit_details->uuid),
            'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($this->unit_details->uuid),
            'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($this->unit_details->uuid),
            'contracts' => app('App\Http\Controllers\ContractController')->show_unit_contracts($this->unit_details->uuid),
            'total_collected_bills' => app('App\Http\Controllers\BillController')->get_unit_bills($this->unit_details->uuid,null,'paid'),
            'total_uncollected_bills' => app('App\Http\Controllers\BillController')->get_unit_bills($this->unit_details->uuid ,null,'unpaid'),
            'utilities' => $utilities,
            'concerns' => Concern::where('unit_uuid', $this->unit_details->uuid)->get(),
            'inventories' => UnitInventory::where('unit_uuid', $this->unit_details->uuid)->where('contract_uuid', '')->get()
        ]);
    }
}
