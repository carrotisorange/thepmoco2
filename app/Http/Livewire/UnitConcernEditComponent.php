<?php

namespace App\Http\Livewire;
use App\Models\ConcernCategory;
use Session;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;

class UnitConcernEditComponent extends Component
{
    public $concern_details;

    public $action_taken;
    public $subject;
    public $assessed_by_id;
    public $assessed_at;
    public $assigned_to_id;
    public $category_id;
    public $urgency;
    public $status;
    public $created_at;
    public $unit_uuid;
    public $concern;
    public $initial_assessment;

    public function mount($concern_details)
    {
        $this->unit_uuid = $concern_details->unit->unit;
        $this->subject = $concern_details->subject;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->action_taken = $concern_details->action_taken;
        $this->assessed_by_id = $concern_details->assessed_by_id;
        $this->assigned_to_id = $concern_details->assigned_to_id;
        $this->assessed_at = $concern_details->assessed_at;
        $this->category_id = $concern_details->category_id;
        $this->urgency = $concern_details->urgency;
        $this->status = $concern_details->status;
        $this->concern = $concern_details->concern;
        $this->assessed_at = $concern_details->assessed_at;
        $this->action_taken = $concern_details->action_taken;
        $this->initial_assessment = $concern_details->initial_assessment;
    }

    protected function rules()
    {
        return [
            'action_taken' => 'nullable',
            'assessed_by_id' => ['nullable'],
            'assigned_to_id' => ['nullable'],
            'assessed_at' => ['nullable'],
            'category_id' => ['nullable'],
            'urgency' => ['nullable'],
            'status' => ['required'],
            'initial_assessment' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
       
        
       $validatedData = $this->validate();

       try{
    
        DB::transaction(function () use ($validatedData){
            $this->concern_details->update($validatedData);
        });

        session()->flash('success', 'Success!');

       }catch(\Exception $e){
        session()->flash('error', 'Something went wrong.');
       }
    }

    public function render()
    {
        return view('livewire.unit-concern-edit-component',[
            'categories' => ConcernCategory::all(),
            'users' => app('App\Http\Controllers\UserPropertyController')->get_property_users(Session::get('property')),
        ]);
    }
}
