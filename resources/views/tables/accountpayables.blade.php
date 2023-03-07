<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>BATCH NO</x-th>
            <x-th>REQUESTED ON</x-th>
            <x-th>REQUESTED BY</x-th>
            <x-th>REQUEST FOR</x-th>
            <x-th>PARTICULARS</x-th>
            <x-th>STATUS</x-th>
            <x-th>AMOUNT</x-th>
            <x-th></x-th>
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
            <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $accountpayable->requester->name }}</x-td>
            <x-td>{{ $accountpayable->request_for }}</x-td>
            <x-td>
                <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get() ;?>
                @foreach ($particulars as $particular)
                {{ $particular->item }},
                @endforeach
            </x-td>



            <x-td>{{$accountpayable->status}}</x-td>
            <x-td>{{ number_format($accountpayable->amount, 2) }}</x-td>
            <x-td>
                @if($accountpayable->status === 'released')
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @elseif($accountpayable->status === 'pending')

                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-2"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @elseif($accountpayable->status === 'prepared')

                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-3"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @elseif($accountpayable->status === 'approved by manager')

                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-4"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @elseif($accountpayable->status === 'approved by ap')

                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-6"
                    class="text-blue-500 text-decoration-line: underline">View</a>
                @else
               
                @endif
            </x-td>
            <x-td>
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                    class="text-blue-500 text-decoration-line: underline">Edit</a>
            </x-td>
            <x-td>
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/download"
                    class="text-blue-500 text-decoration-line: underline">Export</a>
            </x-td>

            <x-td>
                <a href="#/" wire:click="deleteAccountPayable({{ $accountpayable->id }})" wire:loading.remove
                    class="text-red-500 text-decoration-line: underline">Delete</a>

                <a href="#/" wire:loading wire:target="deleteAccountPayable({{ $accountpayable->id }})"
                    class="text-red-500 text-decoration-line: underline">Loading...</a>
            </x-td>

        </tr>
        @endforeach
        <tr>
            <x-td>Total</x-td>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>

            <x-th></x-th>
            <x-th></x-th>
            <x-td>{{ number_format($accountpayables->sum('amount'), 2) }}</x-td>
            <x-th></x-th>
            <x-th></x-th>

        </tr>
    </tbody>
</table>