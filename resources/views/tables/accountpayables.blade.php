<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>DATE</x-th>
            <x-th>REQUEST FOR</x-th>
            <x-th>PARTICULAR</x-th>
            <x-th>REQUESTED BY</x-th>
            <x-th>BILLER</x-th>
            <x-th>AMOUNT</x-th>
            <x-th>APPROVED ON</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($accountpayables as $index => $accountpayable)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $accountpayable->request_for }}</x-td>
            <x-td>
                @if($accountpayable->particular_id)
                {{ $accountpayable->particular->particular }}
                @else
                {{ $accountpayable->particular }}
                @endif
            </x-td>
            <x-td>{{ $accountpayable->requester->name }}</x-td>
            <x-td>
                @if($accountpayable->biller_id)
                {{ $accountpayable->biller->biller }}
                @else

                @endif
            </x-td>
            <x-td>{{ number_format($accountpayable->amount, 2) }}</x-td>
            <x-td>
                @if($accountpayable->approved_at != '0000-00-00 00:00:00')
                {{ Carbon\Carbon::parse($accountpayable->approved_at)->format('M d, Y') }}
                @else
                NA
                @endif
            </x-td>
            <x-td>{{$accountpayable->status}}</x-td>
            <x-td>
                <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                    class="text-blue-500 text-decoration-line: underline">View Attachment</a>
            </x-td>
            <x-td>
                @if($accountpayable->status != 'approved')
                @can('manager')
                <a href="/property/{{ Session::get('property') }}/accountpayable/{{ $accountpayable->id }}/approve"
                    class="text-blue-500 text-decoration-line: underline">Approve</a>
                @endcan
                @else
                @endif
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>