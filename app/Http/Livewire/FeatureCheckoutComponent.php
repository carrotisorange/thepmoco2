<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feature;

class FeatureCheckoutComponent extends Component
{

    public $selectedFeature = [];

    public $selectedAllFeature = false;    

    public function updatedSelectedAllFeature($selectedAllFeature)
    {   
        if($selectedAllFeature)
        {
            $this->selectedFeature = $this->get_features()->pluck('id');

        }else
        {
            $this->selectedFeature = [];
        }
    }

    public function get_features()
    {
        return Feature::all();
    }

    public function submitForm()
    {
        sleep(1);

    }
    
    public function render()
    {
        return view('livewire.feature-checkout-component',[
            'features' => $this->get_features(),
            'total' => Feature::whereIn('id', $this->selectedFeature)->sum('price'),
            'selectedFeatures' => Feature::whereIn('id', $this->selectedFeature)->get()
        ]);
    }
}
