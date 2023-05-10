<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Guest</x-th>
            <x-th>Unit</x-th>   
            <x-th>Check-in</x-th>
            <x-th>Check-out</x-th>
            <x-th>Status</x-th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bookings as $index => $booking)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $booking->guest->guest }}</x-td>
            <x-td>{{ $booking->unit->unit }}</x-td>
            <x-td>{{Carbon\Carbon::parse($booking->movein_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($booking->moveout_at)->format('M d, Y')}}</x-td>
            <x-td>{{ $booking->status }}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>