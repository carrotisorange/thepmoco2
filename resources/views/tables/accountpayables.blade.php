<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>BATCH NO</x-th>
            <x-th>UNIT</x-th>
            <x-th>VENDOR</x-th>
            <x-th>REQUESTED ON</x-th>
            <x-th>REQUESTED BY</x-th>
            <x-th>REQUEST FOR</x-th>
            <x-th>PARTICULARS</x-th>
            <x-th>STATUS</x-th>
            <x-th>AMOUNT</x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($accountpayables as $index => $accountpayable)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $accountpayable->batch_no }}</x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()->unique('unit_uuid'); ?>
                @foreach ($particulars as $particular)
                @if($particular->unit_uuid)
                {{ App\Models\Unit::find($particular->unit_uuid)->unit }},
                @else

                @endif
                @endforeach

            </x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()->unique('unit_uuid'); ?>
                @foreach ($particulars as $particular)
                @if($particular->vendor_id)
                {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }},
                @else

                @endif
                @endforeach
            </x-td>
            <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $accountpayable->requester->name }}</x-td>
            <x-td>{{ $accountpayable->request_for }}</x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->limit(3)->get() ;?>
                @foreach ($particulars as $particular)
                {{ $particular->item }},
                @endforeach
            </x-td>
            <x-td>{{$accountpayable->status}}</x-td>
            <x-td>{{ number_format($accountpayable->amount, 2) }}</x-td>
            <x-td>
                @can('accountownerandmanager')
                @if($accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @else
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-3"
                    class="text-blue-500 text-decoration-line: underline">Approve/Reject</a>
                @endif
                @elsecan('accountpayable')
                @if($accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @elseif($accountpayable->status === 'approved by ap')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-6"
                    class="text-blue-500 text-decoration-line: underline">Upload Payment </a>
                @else
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-5"
                    class="text-blue-500 text-decoration-line: underline">Approve/Reject</a>
                @endif
                @elsecan('ancillary')
                @if($accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @else
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1"
                    class="text-blue-500 text-decoration-line: underline">Edit</a>
                @endif
                @else
                @if($accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @else
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-1"
                    class="text-blue-500 text-decoration-line: underline">Edit</a>
                @endif
                @endcan
            </x-td>
            <x-td>
                @if($accountpayable->status==='pending' || $accountpayable->status==='unknown')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step1/export" target="_blank"
                    class="text-blue-500 text-decoration-line: underline">Export</a>
                @endif
            </x-td>
            <x-td>
                @if($accountpayable->status === 'released' && $accountpayable->request_for === 'purchase')
                <form
                    action="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/liquidation/step-1"
                    method="POST">
                    @csrf
                    <button type="submit" class="text-blue-500 text-decoration-line: underline">Liquidation</button>
                </form>
                @endif
            </x-td>
            {{-- <x-td>
                @if($accountpayable->status!='released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">Edit</a>
                @endif
            </x-td>
            --}}
          

            {{-- <x-td>
                @if($accountpayable->requester_id === auth()->user()->id || $accountpayable->status!='released')
                <a href="#/" wire:click="deleteAccountPayable({{ $accountpayable->id }})" wire:loading.remove
                    class="text-red-500 text-decoration-line: underline">Delete</a>
                @endif

                <a href="#/" wire:loading wire:target="deleteAccountPayable({{ $accountpayable->id }})"
                    class="text-red-500 text-decoration-line: underline">Loading...</a>
            </x-td> --}}
        </tr>
        @endforeach
        <tr>
            <x-td><b>Total</b></x-td>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-td><b>{{ number_format($accountpayables->sum('amount'), 2) }}</b></x-td>
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </tbody>
</table>