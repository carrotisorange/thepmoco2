<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\{AcknowledgementReceipt,Bill,Collection, Remittance};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteCollectionComponent extends Component
{
    public Collection $collection;

    //input variables
    public $description;

    protected function rules()
    {
        return [
            'description' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deleteCollection(){

        $this->validate();

        try{
            DB::beginTransaction();

              Collection::where('property_uuid', Session::get('property_uuid'))
              ->where('ar_no', $this->collection->ar_no)
              ->update([
              'description' => $this->description
              ]);

              $billIds = Collection::where('property_uuid', Session::get('property_uuid'))
              ->where('ar_no', $this->collection->ar_no)
              ->pluck('bill_id');

              $collectionBatchNo = Collection::where('property_uuid', Session::get('property_uuid'))
              ->where('ar_no', $this->collection->ar_no)
              ->value('batch_no');

              Bill::whereIn('id', $billIds)->update([
              'status'=> 'unpaid'
              ]);

              AcknowledgementReceipt::where('collection_batch_no', $collectionBatchNo)->delete();

              Collection::where('property_uuid', Session::get('property_uuid'))
              ->where('ar_no', $this->collection->ar_no)
              ->delete();

              Remittance::where('property_uuid', Session::get('property_uuid'))
              ->where('ar_no', $this->collection->ar_no)
              ->delete();

               DB::commit();
               Log::info('deleted collection id: '. $this->collection->id);

        }catch(\Exception $e){
              DB::rollBack();
              Log::error($e);
              return redirect(url()->previous())->with('error', $e);
        }

        return redirect('/property/'.Session::get('property_uuid').'/collection/')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.delete-collection-component');
    }
}
