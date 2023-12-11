<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use Livewire\WithFileUploads;
use App\Models\{Unit, Violation, Contract, ViolationType, DeedOfSale};

class ViolationShowComponent extends Component
{
    use WithFileUploads;

    public $violation_details;

    public $violation;
    public $type_id;
    public $unit_uuid;
    public $tenant_uuid;
    public $owner_uuid;
    public $image;
    public $details;

    public function mount($violation_details){
        $this->violation = $violation_details->violation;
        $this->type_id = $violation_details->type_id;
        $this->unit_uuid = $violation_details->unit_uuid;
        $this->tenant_uuid = $violation_details->tenant_uuid;
        $this->owner_uuid = $violation_details->owner_uuid;
        $this->image = $violation_details->image;
        $this->details = $violation_details->details;
    }

    protected function rules()
    {
        return [
            'violation' => 'required',
            'type_id' => ['required', Rule::exists('violation_types', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'tenant_uuid' => ['nullable', Rule::exists('tenants', 'uuid')],
            'owner_uuid' => ['nullable', Rule::exists('owners', 'uuid')],
            'details' => 'required',
            // 'image' => 'required | mimes:jpg,bmp,png,pdf,docx| max:10240',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(){

        $validatedInputs = $this->validate();

        try {

            DB::transaction(function () use ($validatedInputs){
                Violation::where('id', $this->violation_details->id)
                ->update($validatedInputs);

                return redirect('/property/'.Session::get('property_uuid').'/violation/'.$this->violation_details->reference_no)->with('success', 'Changes Saved!');
            });

            }catch (\Exception $e) {
                return redirect(url()->previous())->with('error', $e);
        }
    }


    public function removeAttachment(){
        $this->image  = '';
    }

    public function render()
    {
        $types = ViolationType::all();
        $units = Unit::where('property_uuid', Session::get('property_uuid'))->get();
        $tenants = Contract::where('property_uuid',Session::get('property_uuid'))
        ->when($this->unit_uuid, function($query){
        $query->where('unit_uuid', $this->unit_uuid);
        })->groupBy('tenant_uuid')->get();

        $owners = DeedOfSale::where('property_uuid',Session::get('property_uuid'))
        ->when($this->unit_uuid, function($query){
        $query->where('unit_uuid', $this->unit_uuid);
        })->groupBy('owner_uuid')->get();

        return view('livewire.violation-show-component',compact(
            'types','units','tenants','owners'
        ));
    }
}
