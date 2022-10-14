<?php

namespace App\Http\Livewire;
use App\Models\ConcernCategory;
use Session;
use Livewire\Component;

class ConcernRespondComponent extends Component
{
    public $concern;

    public $action_taken;
    public $assessed_by_id;
    public $assessed_at;
    public $assigned_to_id;
    public $category;
    public $urgency;
    public $status;


    public function submitForm()
    {
        sleep(2);

        
    }


    public function render()
    {
        return view('livewire.concern-respond-component',[
            'categories' => ConcernCategory::all(),
            'users' => app('App\Http\Controllers\UserPropertyController')->get_property_users(Session::get('property')),
        ]);
    }
}
