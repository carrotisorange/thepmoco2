<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>

            <x-th>AR #</x-th>
            <x-th>UNIT</x-th>
            {{--<x-th>TENANT</x-th --}} <x-th>DATE APPLIED</x-th>
            <x-th>DATE DEPOSITED</x-th>
            {{--<x-th>PARTICULAR</x-th --}} <x-th>MODE OF PAYMENT</x-th>
            <x-th>AMOUNT PAID</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>

        </tr>
    </thead>

    @foreach ($collections as $payment)
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>

            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <x-td>{{ $payment->ar_no }}</x-td>
            <x-td>{{ $payment->unit->unit }}</x-td>
            {{--<x-td>Basilio</x-td> --}}
            <x-td>
                {{ Carbon\Carbon::parse($payment->created_at)->format('M d, Y')}}
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($payment->update_at)->format('M d, Y')}}
            </x-td>
            {{--<x-td>{{ $payment->particular }}</x-td> --}}
            <x-td>{{ $payment->form }}</x-td>
            <x-td>{{ number_format($payment->collection, 2) }}
            </x-td>
            <x-td>Approved</x-td>

        </tr>

        <!-- More people... -->
    </tbody>
    @endforeach


</table>