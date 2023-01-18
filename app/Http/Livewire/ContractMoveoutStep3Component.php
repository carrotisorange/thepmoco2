<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Session;
use Spatie\Browsershot\Browsershot;

class ContractMoveoutStep3Component extends Component
{
    public $property;
    public $tenant;
    public $contract;

    public $request_for = 'refund';


    public function exportMoveoutClearanceForm(){
        // $html = view('contracts.moveouts.clearance')->render();

      $html = view('accountpayables.pdf.step1')->render();
      
        Browsershot::html($html)->save('example.pdf');


        // Browsershot::url('https://google.com')->save('example.pdf');

        // Browsershot::html($html)->save('example.pdf');

        return 'success';

        //  Contract::where('uuid', $this->contract->uuid)
        //  ->update([
        //  'status' => 'inactive'
        //  ]);
        
     
    


        // Browsershot::html($html)->save(storage_path('app/'.$accountPayable->id.'.pdf'));

         

    }

    public function submitForm(){
        
        sleep(1);

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->request_for.'/step-1')->with('success', 'Step 3 of 4 has been accomplished!');        
    }

    public function render()
    {
        return view('livewire.contract-moveout-step3-component');
    }
}
