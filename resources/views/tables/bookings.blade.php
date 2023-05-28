<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Confirmation No</x-th>
            <x-th>Guest</x-th>
            <x-th>Unit</x-th>
            <x-th>Check-in</x-th>
            <x-th>Check-out</x-th>
            <x-th>Status</x-th>
            <x-th></x-th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bookings as $index => $booking)

        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $booking->uuid }}</x-td>
            <x-td><a href="/property/{{ $booking->property_uuid }}/guest/{{ $booking->guest->uuid }}"
                    class="text-indigo-500 text-decoration-line: underline">{{ $booking->guest->guest }}</a></x-td>
            <x-td><a href="/property/{{ $booking->property_uuid }}/unit/{{ $booking->unit->uuid }}"
                    class="text-indigo-500 text-decoration-line: underline">{{ $booking->unit->unit }}</a></x-td>
            <x-td>{{Carbon\Carbon::parse($booking->movein_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($booking->moveout_at)->format('M d, Y')}}</x-td>
            <x-td>{{ $booking->status }}</x-td>
            <x-td>
                <button data-modal-target="edit-booking-modal-{{$booking->uuid}}"
                    data-modal-toggle="edit-booking-modal-{{$booking->uuid}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            </x-td>
        </tr>
        <!-- Main modal -->
        @livewire('edit-booking-component',['property' => App\Models\Property::find(Session::get('property')), 'booking'
        => $booking], key($booking->uuid))

        @endforeach
    </tbody>
</table>