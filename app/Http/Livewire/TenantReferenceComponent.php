<?php

namespace App\Http\Livewire;
use App\Models\Reference;
use Illuminate\Validation\Rule;
use DB;
use Session;

use Livewire\Component;

class TenantReferenceComponent extends Component
{
    //list of passed parameters
    public $tenant;
    
    //list of input fields
    public $reference;
    public $relationship_id;
    public $mobile_number;
    public $email;

     public function mount($tenant)
     {
        $this->tenant = $tenant;
     }

    protected function rules()
    {
        return [
            'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            'reference' => [ 'required'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'mobile_number' => 'required',   
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        //validate inputs
        $validated_data = $this->validate();

        try
        {
            //store new reference
           $this->store_reference($validated_data);
        }
        catch(\Exception $e)
        {   
            return back()->with('error');
        }
    }


    public function store_reference($validated_data)
    {
        $validated_data['tenant_uuid'] = $this->tenant->uuid;

        Reference::create($validated_data);

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid)->with('success', 'Reference is successfully created.');

    }

    public function render()
    {
        return view('livewire.tenant-reference-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
