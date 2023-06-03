<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feature;
use Exception;
use Str;
use DB;
use Xendit\Xendit;
use App\Models\Subscription;

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
        $subscriptions = Subscription::where('user_id', auth()->user()->id)->where('status', 'active')->pluck('plan_id');

        return Feature::whereNotIn('id', $subscriptions)->get();
    }

    public function submitForm()
    {
        

        $external_id = auth()->user()->id.'_'.Str::random(8);
        
        $description = count($this->selectedFeature).' features';

        for ($i=0; $i<count($this->selectedFeature); $i++) {
            $feature_id = $this->selectedFeature[$i];
            $amount = Feature::find($feature_id)->price;

            app('App\Http\Controllers\SubscriptionController')->store_subscription(
                auth()->user()->id, $feature_id, $external_id, $amount, count($this->selectedFeature)
            );              
        }

        try{

        Xendit::setApiKey(config('services.xendit.xendit_secret_key_dev'));

         $params = [
                'external_id' => $external_id,
                'payer_email' => auth()->user()->email,
                'description' => $description,
                'amount' => $this->get_total(),
                'interval' => 'MONTH',
                'interval_count' => 1,
                'currency'=>'PHP',
                'success_redirect_url' => 'https://manuprop.com/user/'.auth()->user()->username.'/subscriptions/'.$external_id,
                'failure_redirect_url' => 'https://manuprop.com/demo/unlock',
                'customer'=> [
                        'given_name'=> auth()->user()->name,
                        'mobile_number' => auth()->user()->mobile_number,
                        'email' => auth()->user()->email
                ],
                'customer_notification_preference'=>[
                    'invoice_created' => [
                        'email',
                        'sms'
                    ]
                ]
            ];

            $createRecurring = \Xendit\Recurring::create($params);

        return redirect ($createRecurring['last_created_invoice_url']);  

       
        }catch(\Exception $e)
        {
            return back()->with('error', 'Cannot complete your action');
        }
    }

    public function get_selected_features()
    {
        return Feature::whereIn('id', $this->selectedFeature)->get();
    }

    public function get_total()
    {
        return Feature::whereIn('id', $this->selectedFeature)->sum('price');
    }
    
    public function render()
    {
        return view('livewire.feature-checkout-component',[
            'features' => $this->get_features(),
            'total' => $this->get_total(),
            'selectedFeatures' => $this->get_selected_features(),
        ]);
    }
}
