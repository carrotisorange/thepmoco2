<table class="w-full mb-10 text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            {{-- <x-th>#</x-th> --}}
               <x-th>REQUESTED ON</x-th>
            <x-th>BATCH NO</x-th>
         
            <x-th>REQUESTED BY</x-th>
            <x-th>STATUS</x-th>
            <x-th>UNITS</x-th>
            <x-th>PARTICULARS</x-th>
            <x-th>AMOUNT</x-th>
            {{-- <x-th></x-th> --}}
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($accountpayables as $index => $accountpayable)
        <tr>
            {{-- <x-td>{{ $index+1 }}</x-td> --}}
            <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $accountpayable->batch_no }} ({{ App\Models\AccountPayableParticular::where('batch_no',
                    $accountpayable->batch_no)->count(); }})</x-td>
        
                        <?php $firstName= explode(' ', $accountpayable->requester->name); ?>
            <x-td>{{ Str::limit($firstName[0], 10) }}</x-td>
     <x-td>{{ $accountpayable->status }}</x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get()->unique('unit_uuid'); ?>
                @foreach ($particulars as $particular)
                @if($particular->unit_uuid)
                {{
                Str::limit(App\Models\Unit::find($particular->unit_uuid)->unit,20) }},
                @else
                NA
                @endif
                @endforeach

            </x-td>
            {{-- <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get()->unique('unit_uuid'); ?>
                @foreach ($particulars as $particular)
                @if($particular->vendor_id)
                {{
                Str::limit(App\Models\PropertyBiller::find($particular->vendor_id)->biller, 10) }},
                @else
                NA
                @endif
                @endforeach
            </x-td>--}}

            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(2)->get() ;?>
                @foreach ($particulars as $particular)
                {{ Str::limit($particular->item, 10) }},
                @endforeach
            </x-td> 
            {{-- <x-td>{{ $accountpayable->status }}</x-td> --}}
            <?php 
                $amount = App\Models\AccountPayableParticular::
                where('batch_no', $accountpayable->batch_no)
                ->sum('total')
                
            ;?>
    
           
            <x-td>{{ number_format($amount, 2) }}
      
            </x-td>
          
            <x-td>
                @if($accountpayable->requester_id === auth()->user()->id)
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1" class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    View
                </a>
                @elseif($accountpayable->approver_id === auth()->user()->id && $accountpayable->status  === 'pending')
                 <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-2"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        type="button">
                        Approve
                 </a>

                @elseif($accountpayable->approver2_id === auth()->user()->id && $accountpayable->status === 'approved by manager') 
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-3"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        type="button">
                        Approve
                </a>

                @elseif(Session::get('role_id') === 4 && $accountpayable->status === 'approved by ap')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-4"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Upload a payment
                </a>

                @elseif(Session::get('role_id') === 4 && $accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-5"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Liquidate
                </a>
                
                @endif
              
            </x-td>
            @livewire('view-accountpayable-component',['accountpayable' => $accountpayable], key($accountpayable->id))
            @livewire('delete-accountpayable-component',['accountpayable' => $accountpayable], key($accountpayable->id))
        </tr>
        @endforeach
        <tr>
            <x-td><b>Total</b></x-td>
            {{-- <x-th></x-th> --}}
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-td><b>{{ number_format($accountpayables->sum('amount'), 2) }}</b></x-td>
            <x-th></x-th>
        </tr>
    </tbody>
</table>