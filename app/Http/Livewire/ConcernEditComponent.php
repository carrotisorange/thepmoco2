<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use DB;
use App\Models\{Tenant,Unit,ConcernCategory};

class ConcernEditComponent extends Component
{
    use WithFileUploads;

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
    public $tenant;
    public $unit;
    public $concern;
    public $initial_assessment;
    public $availability_time;
    public $availability_date;
    public $action_taken_image;

    public $email;
    public $mobile_number;

    public function mount($concern_details)
    {
        $this->tenant = Tenant::where('uuid', $concern_details->tenant_uuid)->pluck('tenant')->first();
        $this->unit = Unit::where('uuid', $concern_details->unit_uuid)->pluck('unit')->first();
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
        $this->availability_time = $concern_details->availability_time;
        $this->availability_date = $concern_details->availability_date;
        $this->email = $concern_details->email;
        $this->mobile_number = $concern_details->mobile_number;
    }

    protected function rules()
    {
        return [
            'action_taken' => 'nullable',
            'assessed_by_id' => 'nullable',
            'assigned_to_id' => 'nullable',
            'assessed_at' => 'nullable',
            'category_id' => 'nullable',
            'urgency' => 'nullable',
            'status' => 'required',
            'concern' => 'required',
            'initial_assessment' => 'nullable',
            'availability_time' => 'nullable',
            'availability_date' => 'nullable',
            'action_taken_image' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'email' => 'nullable',
            'mobile_number' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
       try{
          $validatedData = $this->validate();

        DB::transaction(function () use ($validatedData){

            if($this->action_taken_image)
            {
                $validatedData['action_taken_image'] = $this->action_taken_image->store('concerns');
            }

            $this->concern_details->update($validatedData);
        });

        $featureId = 3;

        $restrictionId = 3;

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($restrictionId, $featureId);

        return redirect(url()->previous())->with('success', 'Changes Saved!');

       }catch(\Exception $e){
            return back()->with('error',$e);
       }
    }

    public function render()
    {
        if(auth()->user()->role_id === 8){
            $users = '';
        }else{
            $users = app('App\Http\Controllers\Utilities\UserPropertyController')->getPersonnels(Session::get('property_uuid'));
        }

        return view('livewire.features.concern.concern-edit-component',[
            'categories' => ConcernCategory::all(),
            'users' => $users
        ]);
    }
}
