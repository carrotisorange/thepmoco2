<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Livewire\Component;
use DB;
use Session;

class DeedOfSaleBackoutComponent extends Component
{
    public $deedOfSale;

    public $backout_reason;
    public $backout_at;

    protected function rules()
    {
        return [
            'backout_reason' => 'required',
            'backout_at' => 'required | date',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        try{

            $validatedData = $this->validate();

            DB::transaction(function () use ($validatedData){
                DeedOfSale::where('uuid',$this->deedOfSale->uuid)
                ->update([
                    'status' => 'backedout',
                    'backout_at' => $this->backout_at,
                    'backout_reason'=> $this->backout_reason
                ]);
            });

            return redirect('/property/'.Session::get('property').'/owner/'.$this->deedOfSale->owner_uuid)->with('success','Backout is successfully processed.');
            
        }catch(\Exception $e)
        {
            ddd($e);
            return back()->with('error','Cannot perform your action.');
        }
    }

    public function render()
    {
        return view('livewire.deed-of-sale-backout-component');
    }
}
