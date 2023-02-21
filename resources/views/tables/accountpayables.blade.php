<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>REQUESTED ON</x-th>
            <x-th>REQUESTED BY</x-th>
            <x-th>REQUEST FOR</x-th>
            <x-th>PARTICULARS</x-th>

            {{-- <x-th>BILLER</x-th> --}}

            {{-- <x-th>APPROVED ON</x-th> --}}
            <x-th>STATUS</x-th>
            <x-th>AMOUNT</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($accountpayables as $index => $accountpayable)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
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
                <a href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/step-2"
                    class="text-blue-500 text-decoration-line: underline">View</a>
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
            <x-td>{{ number_format($accountpayables->sum('amount'), 2) }}</x-td>
        </tr>
    </tbody>
</table>