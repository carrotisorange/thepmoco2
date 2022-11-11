<form method="POST" id="edit-form" enctype="multipart/form-data"
    action="/property/{{ Session::get('property') }}/owner/{{ $owner->uuid }}/bills/{{ $batch_no }}/pay/update">
    @method('patch')
    @csrf
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <x-th>#</x-th>
                <x-th>Date posted</x-th>
                <x-th>Particular</x-th>
                <x-th>Unit</x-th>
                <x-th>Period</x-th>
                <x-th>Amount Due</x-th>
                <x-th>Payment</x-th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $index => $bill)
            <tr>
                <x-td>{{ $bill->bill_no }}</x-td>
                <x-td>{{Carbon\Carbon::parse($bill->created_at)->format('M d,Y')}}
                </x-td>
                <x-td>{{$bill->particular->particular }}</x-td>
                <x-td>{{$bill->unit->unit }}</x-td>
                <x-td>{{Carbon\Carbon::parse($bill->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
                </x-td>
                <x-td>{{ number_format(($bill->bill-$bill->initial_payment), 2) }}
                </x-td>
                <x-td>
                    <x-table-input form="edit-form" name="bill_id_{{ $index }}" type="hidden" value="{{ $bill->id }}" />
                    <x-table-input form="edit-form" name="collection_amount_{{ $index }}" type="number" required
                        value="{{ $bill->bill-$bill->initial_payment }}" />
                </x-td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>