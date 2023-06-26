<table class="w-full mb-10 text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            {{-- <x-th>#</x-th> --}}
               <x-th>REQUESTED ON</x-th>
            <x-th>BATCH NO</x-th>
         
            <x-th>REQUESTED BY</x-th>
         
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
              @if($accountpayable->status === 'released')
               <span title="released"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @elseif($accountpayable->status === 'approved by manager')
                <span title="{{ $accountpayable->status }}"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                
                 <i class="fa-solid fa-clock"></i>
                
                </span>
                
               <span title="{{ $accountpayable->status }}"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                
                    <i class="fa-solid fa-user-check"></i>
                
                </span>
                @elseif($accountpayable->status === 'approved by ap')
                <span title="{{ $accountpayable->status }}"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            
                                <i class="fa-solid fa-clock"></i>
                            
                            </span>
                <span title="{{ $accountpayable->status }}"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                
          <i class="fa-solid fa-user-check"></i>
                
                </span>
              @else
                <span title="{{ $accountpayable->status }}"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  <i class="fa-solid fa-clock"></i>
                  
                </span>
                @endif
      
            </x-td>
          
            <x-td>
                <button id="dropdownDefaultButton({{ $accountpayable->id }})({{ $accountpayable->id }})" data-dropdown-placement="left-end"
                    data-dropdown-toggle="dropdown({{ $accountpayable->id }})"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium
                    text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2
                    sm:w-auto"
                    type="button">Options <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown({{ $accountpayable->id }})"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton({{ $accountpayable->id }})">
                        <li>
                            @if($accountpayable->status === 'released')
                            @if(App\Models\AccountPayableLiquidation::where('batch_no',
                            $accountpayable->batch_no)->whereNotNull('approved_by')->count())
                            <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/liquidation/step-2"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Liquidated</a>
                            @else

                            @cannot('manager')
                            <form
                                action="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/liquidation/step-1"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create
                                    Liquidation</button>
                            </form>
                            @else
                            <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/liquidation/step-2"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Approve/Reject
                                Liquidation</a>
                            @endcannot

                            @endif
                            @endif
                        </li>
                        <li>
                            @if($accountpayable->status==='pending' || $accountpayable->status==='unknown')
                            <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step1/export"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export
                                Request</a>
                            @endif
                        </li>
                        <li>
                            @if(auth()->user()->id === $accountpayable->requester_id &&
                            ($accountpayable->status==='pending' || $accountpayable->status==='unknown'))
                            <a href="#/" data-modal-target="delete-accountpayable-modal-{{$accountpayable->id}}" data-modal-toggle="delete-accountpayable-modal-{{$accountpayable->id}}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                               >Delete
                                Request</a>
                            @endif
                        </li>
                        <li>
                            @can('accountownerandmanager')
                                @if($accountpayable->status === 'released')
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View
                                    Request</a>
                                @else
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    Request</a>
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-3"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Approve/Reject
                                    Request</a>
                                @endif
                            @elsecan('accountpayable')
                                @if($accountpayable->status === 'released')
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View
                                    Request</a>
                                @elseif($accountpayable->status === 'approved by ap')
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-6"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Upload
                                    Payment </a>
                                @else
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-5"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Approve/Reject
                                    Request</a>
                                @endif
                            @elsecan('ancillary')
                                @if($accountpayable->status === 'released')
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View
                                    Request</a>
                                @else
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    Request</a>
                                @endif
                                @else
                                @if($accountpayable->status === 'released')
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View
                                    Request</a>
                                @else
                                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    Request</a>
                                @endif
                            @endcan
                        </li>

                    </ul>
                </div>
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
            <x-td><b>{{ number_format($accountpayables->sum('amount'), 2) }}</b></x-td>
            <x-th></x-th>
        </tr>
    </tbody>
</table>